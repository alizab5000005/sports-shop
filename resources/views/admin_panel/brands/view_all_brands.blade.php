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
      <h4>All Brands
        <span class="mt-1" style="float: right;">
          <a href="{{url('/admin_panel/brands/add_brand')}}" class="text-light ms-auto">
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
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
        </thead>
        <tbody>
          <?php $s_no = 1; ?>
          @if($brands->count() > 0)
            @foreach($brands as $brand)
              <tr>
                <td>{{$s_no++}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->desc}}</td>
                <td>
                  @if($brand->status == '1') 
                  <a href="{{url('/admin_panel/brands/deactivate_brand/'.$brand->id)}}" class="text-decoration-none">Active</a>
                  @else
                  <a href="{{url('/admin_panel/brands/activate_brand/'.$brand->id)}}" class="text-decoration-none">Deactive</a> 
                  @endif
                </td>
                <td>
                  <a href="{{url('/admin_panel/brands/edit_brand/'.$brand->id)}}"><i class="fa fa-edit text-info"></i></a> / 
                  <a href="{{url('/admin_panel/brands/delete_brand/'.$brand->id)}}"><i class="fa fa-trash text-danger"></i></a>
                </td>
              </tr>
              @endforeach
            @else 
              <tr>
                <td class="text-center" colspan="5">No Categories here, Add one</td>
              </tr>
            @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection