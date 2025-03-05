@extends('layout.master2')
@section('content1')
<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Save Big Today!</p>
                            <h1>Exclusive Summer Deals Now Live!</h1>
                            <div class="hero-btns">
                                <a href="/product"  class="boxed-btn">Products</a>
                                <a href="/product"  class="bordered-btn">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Limited Time Offer - Shop Now!</p>
                            <h1>Special Offers Just for You!</h1>
                            <div class="hero-btns">
                                <a href="/product" class="boxed-btn">Visit shop</a>
                                <a href="/product" class="bordered-btn">Discover</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Mega Sale Going On!</p>
                            <h1>Get December Discount</h1>
                            <div class="hero-btns">
                                <a href="/product"  class="boxed-btn">Discover</a>
                                <a href="/product"  class="bordered-btn">Visit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-section mt-150 mb-150" id="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> categories</h3>
                    <p>choose a category</p>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach ( $categories as $item )

            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/product/{{$item->id}}"><img style="max-height:250px !important ; min-height:250px !important" src={{$item->photo}} alt=""></a>
                    </div>
                    <h3>{{$item->title}}</h3>

                </div>
            </div>
             @endforeach
        </div>


    </div>

</div>
@endsection
