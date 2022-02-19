<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin_panel.products.view_all_products', compact('products'));
    }

   
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('admin_panel.Products.add_Product', compact('categories','brands'));
    }

    
    public function store(Request $request)
    {
        $product_id = Product::create($request->all());
        if($request->has('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('media',$filename,'public');
            Product::where('id', $product_id->id)->update(['image'=>$filename]);
        }
        return redirect('/admin_panel/products/view_all_products')->with('msg','Product has beeen added');
    }

   
    public function show(Product $Product)
    {
        //
    }

  
    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        $categories = Category::where('status', 1)->where('id','!=',$product->category_id)->get();
        $brands = Brand::where('status', 1)->where('id', '!=', $product->brand_id)->get();
        return view('admin_panel.products.edit_product', compact('product','categories','brands'));
    }

   
    public function update(Request $request)
    {
        Product::find($request->id)->update([
                                             'name'=>$request->name,
                                             'category_id'=>$request->category_id,
                                             'brand_id'=>$request->brand_id,
                                             'original_price'=>$request->original_price,
                                             'selling_price'=>$request->selling_price,
                                             'qty'=>$request->qty,
                                             'short_desc'=>$request->short_desc,
                                             'long_desc'=>$request->long_desc
                                            ]);
        if($request->has('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('media',$filename,'public');
            Product::where('id', $request->id)->update(['image'=>$filename]);
        }
        return redirect('/admin_panel/products/view_all_products')->with('msg','Product has been updated');
    }

    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect('/admin_panel/products/view_all_products')->with('msg','Product has been deleted');
    }

    public function deactivate(Request $request)
    {
        Product::find($request->id)->update(['status'=>'0']);
        return redirect('/admin_panel/products/view_all_products')->with('msg','Product has been deactivated');
    }

    public function activate(Request $request)
    {
        Product::find($request->id)->update(['status'=>'1']);
        return redirect('/admin_panel/products/view_all_products')->with('msg','Product has been Activated');
    }
}
