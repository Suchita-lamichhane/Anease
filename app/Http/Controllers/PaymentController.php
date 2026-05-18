<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private function esewaConfig(): array
    {
        return [
            'merchant_code' => config('esewa.merchant_code', 'EPAYTEST'),
            'secret_key'    => config('esewa.secret_key', '8gBm/:&EnhH.1/q'),
            'form_url'      => config('esewa.form_url', 'https://rc-epay.esewa.com.np/api/epay/main/v2/form'),
            'status_url'    => config('esewa.status_url', 'https://rc.esewa.com.np/api/epay/transaction/status/'),
        ];
    }

    private function generateSignature(string $message, string $secretKey): string
    {
        return base64_encode(hash_hmac('sha256', $message, $secretKey, true));
    }

    public function initiatePayment(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname'  => 'required|string|max:100',
            'email'     => 'required|email',
            'address'   => 'required|string|max:255',
            'city'      => 'required|string|max:100',
            'phone'     => 'required|string|max:20',
        ]);

        $user  = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $totalAmount = 0;
        foreach ($carts as $item) {
            $cleanPrice   = str_replace(['$', ','], '', $item->product_price ?? '0');
            $totalAmount += floatval($cleanPrice) * ($item->quantity ?? 1);
        }
        $totalAmount = round($totalAmount, 2);

        $transactionUuid = 'ANS-' . time() . '-' . Auth::id();

        $billingDetails = json_encode([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'address'   => $request->address,
            'city'      => $request->city,
            'phone'     => $request->phone,
        ]);

        $paymentMethod = $request->paymentMethod === 'cod' ? 'cod' : 'esewa';

        $order = Order::create([
            'user_id'         => $user->id,
            'amount'          => $totalAmount,
            'transaction_uuid'=> $transactionUuid,
            'status'          => $paymentMethod === 'cod' ? 'COD' : 'pending',
            'payment_method'  => $paymentMethod,
            'product_details' => $carts->map(fn($i) => $i->product_name . ' x' . ($i->quantity ?? 1))->implode(', '),
            'billing_details' => $billingDetails,
        ]);

        if ($paymentMethod === 'cod') {
            Cart::where('user_id', $user->id)->delete();
            return redirect('/home')->with('success', 'Order placed successfully! Please pay on delivery.');
        }

        $config    = $this->esewaConfig();
        $message   = "total_amount=$totalAmount,transaction_uuid=$transactionUuid,product_code={$config['merchant_code']}";
        $signature = $this->generateSignature($message, $config['secret_key']);

        $formData = [
            'amount'                  => $totalAmount,
            'tax_amount'              => '0',
            'total_amount'            => $totalAmount,
            'transaction_uuid'        => $transactionUuid,
            'product_code'            => $config['merchant_code'],
            'product_service_charge'  => '0',
            'product_delivery_charge' => '0',
            'success_url'             => route('payment.success'),
            'failure_url'             => route('payment.failure'),
            'signed_field_names'      => 'total_amount,transaction_uuid,product_code',
            'signature'               => $signature,
        ];

        return view('esewa_redirect', compact('formData'));
    }

    public function paymentSuccess(Request $request)
    {
        $encodedData = $request->query('data');

        if (!$encodedData) {
            return redirect('/checkout')->with('error', 'Invalid payment response.');
        }

        $decodedData = json_decode(base64_decode($encodedData), true);

        if (!$decodedData || !isset($decodedData['transaction_uuid'], $decodedData['status'])) {
            return redirect('/checkout')->with('error', 'Invalid payment response data.');
        }

        // Verify response signature to prevent fraud
        if (!$this->verifyResponseSignature($decodedData)) {
            Log::warning('eSewa signature verification failed', $decodedData);
            return redirect('/checkout')->with('error', 'Payment verification failed. Please contact support.');
        }

        $transactionUuid = $decodedData['transaction_uuid'];
        $order = Order::where('transaction_uuid', $transactionUuid)->first();

        if (!$order) {
            Log::warning('eSewa success: order not found', ['transaction_uuid' => $transactionUuid]);
            return redirect('/checkout')->with('error', 'Order not found.');
        }

        // Prevent double-processing
        if ($order->status === 'completed') {
            return redirect('/home')->with('success', 'Your order is already confirmed!');
        }

        // Verify with eSewa status API
        $verified = $this->verifyWithEsewaApi($transactionUuid, $order->amount);

        if (!$verified) {
            $order->update(['status' => 'failed']);
            Log::warning('eSewa status API verification failed', ['transaction_uuid' => $transactionUuid]);
            return redirect('/checkout')->with('error', 'Payment could not be verified. Please contact support.');
        }

        $order->update([
            'status' => 'completed',
            'ref_id' => $decodedData['transaction_code'] ?? null,
        ]);

        Cart::where('user_id', $order->user_id)->delete();

        return redirect('/home')->with('success', 'Payment successful! Your order has been placed.');
    }

    public function paymentFailure(Request $request)
    {
        // Mark pending order as failed if uuid is available
        $encodedData = $request->query('data');
        if ($encodedData) {
            $decodedData = json_decode(base64_decode($encodedData), true);
            if (!empty($decodedData['transaction_uuid'])) {
                Order::where('transaction_uuid', $decodedData['transaction_uuid'])
                    ->where('status', 'pending')
                    ->update(['status' => 'failed']);
            }
        }

        return redirect('/checkout')->with('error', 'Payment failed or was cancelled. Please try again.');
    }

    private function verifyResponseSignature(array $data): bool
    {
        if (!isset($data['signed_field_names'], $data['signature'])) {
            return false;
        }

        $config      = $this->esewaConfig();
        $fieldNames  = explode(',', $data['signed_field_names']);
        $parts       = [];

        foreach ($fieldNames as $field) {
            $field = trim($field);
            if (!isset($data[$field])) {
                return false;
            }
            $parts[] = "$field={$data[$field]}";
        }

        $message           = implode(',', $parts);
        $expectedSignature = $this->generateSignature($message, $config['secret_key']);

        return hash_equals($expectedSignature, $data['signature']);
    }

    private function verifyWithEsewaApi(string $transactionUuid, float $totalAmount): bool
    {
        $config = $this->esewaConfig();

        try {
            $response = Http::timeout(15)->get($config['status_url'], [
                'product_code'     => $config['merchant_code'],
                'total_amount'     => $totalAmount,
                'transaction_uuid' => $transactionUuid,
            ]);

            if (!$response->successful()) {
                Log::error('eSewa status API HTTP error', ['status' => $response->status()]);
                return false;
            }

            $result = $response->json();

            return isset($result['status']) && $result['status'] === 'COMPLETE'
                && isset($result['transaction_uuid']) && $result['transaction_uuid'] === $transactionUuid
                && isset($result['total_amount']) && (float) $result['total_amount'] === (float) $totalAmount;

        } catch (\Exception $e) {
            Log::error('eSewa status API exception', ['message' => $e->getMessage()]);
            return false;
        }
    }
}
