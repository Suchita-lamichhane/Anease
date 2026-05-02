<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuchiController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function product()
    {
        $products = Product::latest()->get();
        return view('product', compact('products'));
    }

    public function save(Request $request)
    {
        $product = new Product;
        $product->photo = $request->photo;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->star = $request->star;
        $product->review = $request->review;
        $product->save();

        return redirect()->back();
    }

    public function recommendation() {
        return view('recommendation');
    }

    public function skinConcern() {
        $products = Product::all();
        return view('skin_concern', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Product::where('name', 'LIKE', "%{$query}%")
                           ->orWhere('description', 'LIKE', "%{$query}%")
                           ->get();

        return view('search', compact('items', 'query'));
    }

    public function checkout() {
        if(!Auth::check()) {
            return redirect('/login');
        }
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('checkout', compact('carts'));
    }

    public function addToCart(Request $request) {
        if(!Auth::check()) {
            return redirect('/login')->withErrors(['login' => 'Please login to add items to your cart']);
        }

        Cart::create([
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
            'product_photo' => $request->product_photo,
            'product_price' => $request->product_price,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart(Request $request) {
        if(!Auth::check()) {
            return redirect('/login');
        }

        Cart::where('id', $request->cart_id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function wishlist() {
        if(!Auth::check()) {
            return redirect('/login');
        }
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist', compact('wishlists'));
    }

    public function addToWishlist(Request $request) {
        if(!Auth::check()) {
            return redirect('/login')->withErrors(['login' => 'Please login to add items to your wishlist']);
        }

        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
        ], [
            'product_photo' => $request->product_photo,
            'product_price' => $request->product_price,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

    public function removeFromWishlist(Request $request) {
        if(!Auth::check()) {
            return redirect('/login');
        }

        Wishlist::where('id', $request->wishlist_id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist successfully!');
    }

    public function adminDashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::whereIn('status', ['completed', 'COD'])->count();
        $totalRevenue = Order::whereIn('status', ['completed', 'COD'])->get()->sum(function($order) {
            return floatval(str_replace(['$', ','], '', $order->amount));
        });

        $checkoutCustomers = User::whereHas('orders', function($q) {
            $q->whereIn('status', ['completed', 'COD']);
        })->latest()->take(5)->get();
        
        $recentOrders = Order::with('user')->whereIn('status', ['completed', 'COD'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue', 'checkoutCustomers', 'recentOrders'));
    }

    public function adminCustomers() {
        $users = User::latest()->get();
        return view('admin.customers', compact('users'));
    }

    public function adminProducts() {
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
    }

    public function adminAddProduct(Request $request) {
        $product = new Product;
        $product->photo = $request->photo ?? 'assets/default.png';
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->star = $request->star ?? 5;
        $product->review = $request->review ?? 0;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function adminEditProduct(Request $request, $id) {
        $product = Product::find($id);
        if($product) {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->photo = $request->photo;
            $product->description = $request->description;
            $product->save();
            return redirect()->back()->with('success', 'Product updated successfully!');
        }
        return redirect()->back()->withErrors(['error' => 'Product not found.']);
    }

    public function adminDeleteProduct($id) {
        $product = Product::find($id);
        if($product) {
            $product->delete();
        }
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
