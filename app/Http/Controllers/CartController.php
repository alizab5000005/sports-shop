<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
   
    public function add_to_cart(Request $request)
    {
        Cart::create($request->all());
        return redirect('/show_cart_items')->with('msg','Item Added to Cart');

    }

    
    public function show_cart_items(Cart $cart)
    {
        $cart_items = Cart::where('customer_id', auth()->user()->id)->get();
        $cart = Cart::where('customer_id', auth()->user()->id)->get();
        return view('cart', compact('cart_items', 'cart'));
    }

    public function delete_cart_item(Request $request)
    {
        Cart::destroy($request->id);
        return redirect('/show_cart_items')->with('msg','Item has been removed');
    }
}
