@extends('layouts.app')
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
            <h4> <a class="text-decoration-none text-light" href="{{url('/admin_panel/categories/view_all_categories')}}"><i class="fa fa-arrow-left"></i></a> Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('/admin_panel/categories/update_category/'.$category->id)}}" method="post">
                @csrf
                <div class="form-group my-2">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="form-group my-2">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control" value="{{$category->desc}}">
                </div>
                <div class="form-group my-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection