<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        
        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $totalAmount = 0;
        foreach($carts as $item) {
            $cleanPrice = str_replace(['$', ','], '', $item->product_price ?? '0');
            $totalAmount += floatval($cleanPrice);
        }

        $transactionUuid = 'ANEASE-' . Auth::id() . '-' . uniqid() . '-' . rand(100000, 999999);
        
        // Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'amount' => $totalAmount,
            'transaction_uuid' => $transactionUuid,
            'status' => $request->paymentMethod === 'cod' ? 'COD' : 'pending',
            'product_details' => $carts->pluck('product_name')->implode(', ')
        ]);

        if ($request->paymentMethod === 'cod') {
            // Clear cart immediately for COD
            Cart::where('user_id', $user->id)->delete();
            return redirect('/home')->with('success', 'Order placed successfully! Please pay on delivery.');
        }

        $totalAmount = round($totalAmount, 2);
        $merchantCode = 'EPAYTEST';
        $secretKey = '8g8M$8ga6S28';
        
        // eSewa v2 signature requires consistent formatting
        $message = "total_amount=$totalAmount,transaction_uuid=$transactionUuid,product_code=$merchantCode";
        $signature = base64_encode(hash_hmac('sha256', $message, $secretKey, true));

        $formData = [
            'amount' => $totalAmount,
            'failure_url' => route('payment.failure'),
            'product_delivery_charge' => '0',
            'product_service_charge' => '0',
            'product_code' => $merchantCode,
            'signature' => $signature,
            'signed_field_names' => 'total_amount,transaction_uuid,product_code',
            'success_url' => route('payment.success'),
            'tax_amount' => '0',
            'total_amount' => $totalAmount,
            'transaction_uuid' => $transactionUuid,
        ];

        return view('esewa_redirect', compact('formData'));
    }

    public function paymentSuccess(Request $request)
    {
        $encodedData = $request->data;
        $decodedData = json_decode(base64_decode($encodedData), true);
        
        // Status: COMPLETE
        if ($decodedData && $decodedData['status'] === 'COMPLETE') {
            $order = Order::where('transaction_uuid', $decodedData['transaction_uuid'])->first();
            
            if ($order) {
                $order->update([
                    'status' => 'completed',
                    'ref_id' => $decodedData['transaction_code']
                ]);
                
                // Clear cart
                Cart::where('user_id', $order->user_id)->delete();
                
                return redirect('/home')->with('success', 'Payment Successful! Your order has been placed.');
            }
        }

        return redirect('/checkout')->with('error', 'Payment verification failed.');
    }

    public function paymentFailure()
    {
        return redirect('/checkout')->with('error', 'Payment failed or was cancelled.');
    }
}
