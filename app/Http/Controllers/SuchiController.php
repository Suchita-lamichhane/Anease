<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

         // $product = new Product;
         // $product->name ='cleanser' ;
         // $product->price ='200$';
         // $product->save();

         return view('product');
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
        return "ok";
     }

    //
}
