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
            <h4> <a class="text-decoration-none text-light" href="{{url('/admin_panel/brands/view_all_brands')}}"><i class="fa fa-arrow-left"></i></a> Edit Brand</h4>
        </div>
        <div class="card-body">
            <form action="{{url('/admin_panel/brands/update_brand/'.$brand->id)}}" method="post">
                @csrf
                <div class="form-group my-2">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                </div>
                <div class="form-group my-2">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control" value="{{$brand->desc}}">
                </div>
                <div class="form-group my-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection