@extends('layouts.app')
@section('content')
<div class="container">
    @foreach($product as $pro)
    <div class="row my-4">
        <div class="col-lg-6">
            <img src="{{url('/storage/media/'.$pro->image)}}" style="height:500px; width:500px;object-fit:cover">
        </div>
        <div class="col-lg-6">
            <h4>{{$pro->name}}</h4>
            <h6><span class='fw-bold'>Brand</span> : {{$pro->brands->name}}</h6>
            <h6><span class='fw-bold'>Category</span> : {{$pro->categories->name}}</h6>
            <h6><span class='fw-bold'>Original Price</span> : Rs <strike>{{number_format($pro->original_price)}}</strike>/-</h6>
            <h6><span class='fw-bold'>Selling Price</span> : Rs {{number_format($pro->selling_price)}}/-</h6>
            <h6><span class='fw-bold'>Short Description</span> : {{$pro->short_desc}}</h6>
            <form method="post" action="{{url('/add_to_cart')}}">
                @csrf
                <h6><span class='fw-bold'>Quantity</span> : <input type="number" name="qty" min="1" max="{{$pro->qty}}" required></h6>
                <input type="hidden" name="product_id" value="{{$pro->id}}">
                @if(Auth::user())
                <input type="hidden" name="customer_id" value="{{Auth::user()->id}}">
                @endif
                <input type="submit" value="Add To Cart" class="btn btn-primary"/>
            </form>
        </div>
        <div>
        <h6 class='fw-bold mt-2'>Comprehensive Description</h6>
        <p>{{$pro->long_desc}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection