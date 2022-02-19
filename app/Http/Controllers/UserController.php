<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $customers = User::where('role','!=',1)->orderBy('id','Desc')->get();
        return view('admin_panel/customers/view_all_customers', compact('customers'));
    }

    public function delete(Request $request)
    {
       User::destroy($request->id);
        return redirect('/admin_panel/customers/view_all_customers')->with('msg','Customer has been deleted');
    }

    public function deactivate(Request $request)
    {
        User::find($request->id)->update(['status'=>'0']);
        return redirect('/admin_panel/customers/view_all_customers')->with('msg','Customer has been deactivated');
    }

    public function activate(Request $request)
    {
       User::find($request->id)->update(['status'=>'1']);
        return redirect('/admin_panel/customers/view_all_customers')->with('msg','Customer has been Activated');
    }
}
