<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin_panel.categories.view_all_categories', compact('categories'));
    }

   
    public function create()
    {
        return view('admin_panel.categories.add_category');
    }

    
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/admin_panel/categories/view_all_categories')->with('msg','Category has beeen added');
    }

   
    public function show(Category $category)
    {
        //
    }

  
    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        return view('admin_panel.categories.edit_category', compact('category'));
    }

   
    public function update(CategoryRequest $request)
    {
        Category::find($request->id)->update(['name'=>$request->name, 'desc'=>$request->desc]);
        return redirect('/admin_panel/categories/view_all_categories')->with('msg','Category has been updated');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect('/admin_panel/categories/view_all_categories')->with('msg','Category has been deleted');
    }

    public function deactivate(Request $request)
    {
        Category::find($request->id)->update(['status'=>'0']);
        return redirect('/admin_panel/categories/view_all_categories')->with('msg','Category has been deactivated');
    }

    public function activate(Request $request)
    {
        Category::find($request->id)->update(['status'=>'1']);
        return redirect('/admin_panel/categories/view_all_categories')->with('msg','Category has been Activated');
    }
}
