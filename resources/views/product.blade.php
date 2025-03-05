@extends('layout.master2')
@section('content1')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p> Welcom {{ Auth::user()->name }} to OurStore </p>
                    <h1>Products</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ( $products as $row )


            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/product_detaill/{{$row->id}}"><img style="max-height:250px !important ; min-height:250px !important" src={{asset($row->photo)}} alt=""></a>
                    </div>
                    <h3>{{$row->name}}</h3>
                    <p class="product-price"><span>{{$row->quantity}}</span> {{$row->price}}$ </p>
                    <a href="/product_detaill/{{$row->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
