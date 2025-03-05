@extends('layout.master1')
@section('content')


<!-- end breadcrumb section -->


<!-- featured section -->
<div class="feature-bg" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">Why <span class="orange-text">OurStor</span></h2>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="content">
                                    <h3>Home Delivery</h3>
                                    <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="content">
                                    <h3>Best Price</h3>
                                    <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="content">
                                    <h3>Custom Box</h3>
                                    <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <div class="content">
                                    <h3>Quick Refund</h3>
                                    <p>sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <p>Quality products for every lifestyle, all in one place.</p>
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
                    @if (auth()->user())
                      <a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

                    @else
                    <a href={{route('register')}} class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
