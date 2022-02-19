@extends('layouts.app')
@section('content')

<div class="container p-4">
  @if(session('msg'))
   <div class="alert alert-success">
    {{session('msg')}}
   </div>
  @endif
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h4>Cart
        <span class="mt-1" style="float: right;">
          <a href="{{url('/')}}" class="text-light ms-auto">
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
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
         </tr>
        </thead>
        <tbody>
          <?php $s_no = 1; $gt=0?>
          @if($cart_items->count() > 0)
          @foreach($cart_items as $item)
          <?php $gt += $item->products->selling_price * $item->qty ?>
              <tr>
                <td>{{$s_no++}}</td>
                <td><img src="{{asset('storage/media/'.$item->products->image)}}" width="100" height="80"></td>
                <td>{{$item->products->name}}</td>
                <td>Rs {{number_format($item->products->selling_price)}}/-</td>
                <td>{{$item->qty}}</td>
                <td>Rs {{number_format($item->products->selling_price * $item->qty)}}/-</td>
                <td>
                 <a href="{{url('/delete_cart_item/'.$item->id)}}"><i class="fa fa-trash text-danger"></i></a>
                </td>
              </tr>
              @endforeach
            @else 
              <tr>
                <td class="text-center" colspan="5">No cart_items here, Add one</td>
              </tr>
            @endif
            <tr>
                <th colspan="3"><a class="btn btn-success d-grid" href="#">Proceed To Checkout</a><th>
                <th colspan="2">Grand Total Rs {{number_format($gt)}}/-<th>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection