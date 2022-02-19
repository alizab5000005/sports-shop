<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin_panel.brands.view_all_brands', compact('brands'));
    }

   
    public function create()
    {
        return view('admin_panel.brands.add_brand');
    }

    
    public function store(BrandRequest $request)
    {
        Brand::create($request->all());
        return redirect('/admin_panel/brands/view_all_brands')->with('msg','Brand has beeen added');
    }

   
    public function show(Brand $brand)
    {
        //
    }

  
    public function edit(Request $request)
    {
        $brand = Brand::find($request->id);
        return view('admin_panel.brands.edit_brand', compact('brand'));
    }

   
    public function update(BrandRequest $request)
    {
        Brand::find($request->id)->update(['name'=>$request->name, 'desc'=>$request->desc]);
        return redirect('/admin_panel/brands/view_all_brands')->with('msg','Brand has been updated');
    }

    public function delete(Request $request)
    {
        Brand::destroy($request->id);
        return redirect('/admin_panel/brands/view_all_brands')->with('msg','Brand has been deleted');
    }

    public function deactivate(Request $request)
    {
        Brand::find($request->id)->update(['status'=>'0']);
        return redirect('/admin_panel/brands/view_all_brands')->with('msg','Brand has been deactivated');
    }

    public function activate(Request $request)
    {
        Brand::find($request->id)->update(['status'=>'1']);
        return redirect('/admin_panel/brands/view_all_brands')->with('msg','Brand has been Activated');
    }
}
