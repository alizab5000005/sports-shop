@extends('layouts.app')
@section('content')
<div class="p-4">
  @if(session('msg'))
   <div class="alert alert-success">
    {{session('msg')}}
   </div>
  @endif
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h4>All Products
        <span class="mt-1" style="float: right;">
          <a href="{{url('/admin_panel/products/add_product')}}" class="text-light ms-auto">
            <i class="fa fa-plus"></i>
          </a>
        </span>
      </h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>S_NO.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Original Price</th>
            <th>Selling Price</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
        </thead>
        <tbody>
          <?php $s_no = 1; ?>
          @if($products->count() > 0)
            @foreach($products as $product)
              <tr>
                <td>{{$s_no++}}</td>
                <td>{{$product->name}}</td>
                <td><img src="{{asset('storage/media/'.$product->image)}}" width="100" height="80"></td>
                <td>{{$product->original_price}}</td>
                <td>{{$product->selling_price}}</td>
                <td>{{$product->categories->name}}</td>
                <td>{{$product->brands->name}}</td>
                <td>
                  @if($product->status == '1') 
                  <a href="{{url('/admin_panel/products/deactivate_product/'.$product->id)}}" class="text-decoration-none">Active</a>
                  @else
                  <a href="{{url('/admin_panel/products/activate_product/'.$product->id)}}" class="text-decoration-none">Deactive</a> 
                  @endif
                </td>
                <td>
                  <a href="{{url('/admin_panel/products/edit_product/'.$product->id)}}"><i class="fa fa-edit text-info"></i></a> / 
                  <a href="{{url('/admin_panel/products/delete_product/'.$product->id)}}"><i class="fa fa-trash text-danger"></i></a>
                </td>
              </tr>
              @endforeach
            @else 
              <tr>
                <td class="text-center" colspan="5">No products here, Add one</td>
              </tr>
            @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection