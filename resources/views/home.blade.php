@extends('layouts.app')


@section('content')

@if(session('msg'))
    <div class="alert alert-danger">
        {{session('msg')}}
    </div>
@endif

<div>
    <img src="{{asset('/assets/images/banner.jpg')}}" style="width: 100%; height:500px">
</div>
<div class="container">
    <!-- latest products start-->    
    <div class="d-flex">
        <h3 >Lastest Items</h3>
        <div class="dropdown ms-3 ">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach($categories as $category)
                <li><a class="dropdown-item" href="{{url('/category_items/'.$category->id)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="dropdown ms-3 ">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Brands
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach($brands as $brand)
                <li><a class="dropdown-item" href="{{url('/brand_items/'.$brand->id)}}">{{$brand->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr style="width: 410px; ">
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3 my-2">
            <div class="card" style="width: 17rem;" >
                <img src="{{asset('/storage/media/'.$product->image)}}" class="card-img-top" style="height: 200px; object-fit:cover">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">
                        <span class="text-decoration-line-through">Rs {{number_format($product->original_price)}}/-</span> 
                        <span class="fw-bold">Rs {{number_format($product->selling_price)}}/-</span>
                    </p>
                    <a href="{{url('/product_details/'.$product->id)}}" class="btn btn-primary d-grid">Check Details </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- latest products start-->    

    <!-- popular products start-->    
    <h3 class="mt-5">Popular Items</h3>
    <hr style="width: 200px; ">
    <div class="row">
        @foreach($popular_products as $product)
        <div class="col-lg-3 my-2">
            <div class="card" style="width: 17rem;" >
                <img src="{{asset('/storage/media/'.$product->image)}}" class="card-img-top" style="height: 200px; object-fit:cover">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">
                        <span class="text-decoration-line-through">Rs {{number_format($product->original_price)}}/-</span> 
                        <span class="fw-bold">Rs {{number_format($product->selling_price)}}/-</span>
                    </p>
                    <a href="{{url('/product_details/'.$product->id)}}" class="btn btn-primary d-grid">Check Details </a>
                </div>
            </div>
        </div>
        @endforeach
    <!-- popular products end-->    

    <!-- feature products start-->
    <h3 class="mt-5">Feature Items</h3>
    <hr style="width: 200px; ">
    <div class="row">
        @foreach($feature_products as $product)
        <div class="col-lg-3 my-2">
            <div class="card" style="width: 17rem;" >
                <img src="{{asset('/storage/media/'.$product->image)}}" class="card-img-top" style="height: 200px; object-fit:cover">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">
                        <span class="text-decoration-line-through">Rs {{number_format($product->original_price)}}/-</span> 
                        <span class="fw-bold">Rs {{number_format($product->selling_price)}}/-</span>
                    </p>
                    <a href="{{url('/product_details/'.$product->id)}}" class="btn btn-primary d-grid">Check Details </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
     <!-- feature products end-->

    
    <div class="row my-5">
        <div class="col-lg-6">
            <img src="{{asset('/assets/images/banner.jpg')}}" width="500s" alt="">
        </div>
        <div class="col-lg-6">
            <h3>ABOUT US</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Quasi sunt similique cupiditate tempore. Vitae delectus laborum veniam,
                 eaque exercitationem, eligendi, atque id reprehenderit 
                voluptas iure odio! Provident soluta commodi expedita!
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Quasi sunt similique cupiditate tempore. Vitae delectus laborum veniam,
                 eaque exercitationem, eligendi, atque id reprehenderit 
                voluptas iure odio! Provident soluta commodi expedita!</p>
                <a href="#" class="btn btn-info">Read More</a>
        </div>
    </div>

</div>
@endsection
