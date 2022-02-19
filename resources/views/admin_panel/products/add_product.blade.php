@extends('layouts/app')
@section('content')
<div class="p-4">

  @if($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger">
    {{$error}}
  </div>
  @endforeach
  @endif

  <div class="card">
    <div class="card-header bg-primary text-light">
      <h4><a class="text-decoration-none text-light" href="{{url('/admin_panel/products/view_all_products')}}"><i class="fa fa-arrow-left"></i></a> Add Product</h4>
    </div>
    <div class="card-body">
      <form action="{{url('/admin_panel/products/store_product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group my-2 col-lg-4">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group my-2 col-lg-4">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
              <option value="">--Select a Category--</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group my-2 col-lg-4">
            <label>Brand</label>
            <select name="brand_id" class="form-control" required>
            <option value="">--Select a Brand--</option>
              @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-lg-4">
            <label>Original Price</label>
            <input type="number" name="original_price" class="form-control" required>
          </div>
          <div class="form-group col-lg-4">
            <label>Selling Price</label>
            <input type="number" name="selling_price" class="form-control" required>
          </div>
          <div class="form-group col-lg-4">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" required>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <label>Image</label>
              <input type="file" name="image" class="form-control" required accept=".png,.jpg,.jpeg">
            </div>
            <div class="form-group col-lg-6">
              <label>Short Description</label>
              <textarea name="short_desc" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label>Comprehensive Description</label>
            <textarea name="long_desc" class="form-control" required></textarea>
          </div>
        </div>
        <div class="form-group my-2">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection