@extends('layouts/app')
@section('content')
<div class="p-4">
  @if(session('msg'))
   <div class="alert alert-success">
    {{session('msg')}}
   </div>
  @endif
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h4>All Customers
        
        </span>
      </h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>S_NO.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
        </thead>
        <tbody>
          <?php $s_no = 1; ?>
          @if($customers->count() > 0)
            @foreach($customers as $customer)
              <tr>
                <td>{{$s_no++}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                  @if($customer->status == '1') 
                  <a href="{{url('/admin_panel/customers/deactivate_customer/'.$customer->id)}}" class="text-decoration-none">Active</a>
                  @else
                  <a href="{{url('/admin_panel/customers/activate_customer/'.$customer->id)}}" class="text-decoration-none">Deactive</a> 
                  @endif
                </td>
                <td>
                  <a href="{{url('/admin_panel/customers/delete_customer/'.$customer->id)}}"><i class="fa fa-trash text-danger"></i></a>
                </td>
              </tr>
              @endforeach
            @else 
              <tr>
                <td class="text-center" colspan="5">No Customers here</td>
              </tr>
            @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection