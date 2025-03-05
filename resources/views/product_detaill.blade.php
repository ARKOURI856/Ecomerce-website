@extends('layout.master2')
@section('content1')
@foreach ($products as $row )
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>{{$row->name}} </p>
                    <h2 style="color: white">Welcom {{ Auth::user()->name }} to OurStore</h2>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src={{asset($row->photo)}} alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$row->name}}</h3>
                    <p class="single-product-pricing"><span>{{$row->quantity}}</span> ${{$row->price}}</p>
                    <p>{{$row->decreption}}</p>
                    <div class="single-product-form">

                        <form id="add-to-cart-form" action={{route('add.cart',$row->id)}} method="POST">
                            @csrf
                             <input type="hidden" name="product_id" value="{{$row->id}}">
                            <input type="number" name="qty" placeholder="1" min="1" max={{$row->quantity}} >
                         <div class="form-group">

                    <button  class="btn text-white btn-block bg-dark">
                        Add to cart
                    </button>

                </div>
            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach()
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-to-cart-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            Swal.fire({
                title: 'Adding to cart...',
                text: 'Please wait while we add the product to your cart.',
                icon: 'info',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            });

            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                type: 'POST',
                url: '{{ route("add.cart") }}',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: 'Product added to cart successfully!',
                        icon: 'success'
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Product is already in your cart!',
                        icon: 'error'
                    });
                }
            });
        });
    });
</script>
@endsection
