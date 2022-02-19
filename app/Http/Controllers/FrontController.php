<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->get();
        $popular_products = Product::where('status',1)->where('popular',1)->get();
        $feature_products = Product::where('status',1)->where('featured',1)->get();
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $cart = Cart::where('customer_id', auth()->user()->id)->get();
        return view('home', compact('products','popular_products','feature_products','categories','brands', 'cart'));
    }

    public function product_details(Request $request)
    {
        $product = Product::where('id',$request->id)->get();
        $cart = Cart::where('customer_id', auth()->user()->id)->get();
        return view('product_details', compact('product','cart'));
    }

    public function category_items(Request $request)
    {
        $products = Product::where('category_id',$request->id)->get();
        $popular_products = Product::where('status',1)->where('status',1)->where('popular',1)->get();
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $cart = Cart::where('customer_id', auth()->user()->id)->get();
        return view('home', compact('products','popular_products','categories','brands', 'cart'));
    }

    public function brand_items(Request $request)
    {
        $products = Product::where('brand_id',$request->id)->get();
        $categories = Brand::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $cart = Cart::where('customer_id', auth()->user()->id)->get();
        return view('home', compact('products','categories','brands', 'cart'));
    }


   
}
