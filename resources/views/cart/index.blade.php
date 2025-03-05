@extends('layout.master2')

@section('content1')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p> Welcom {{ Auth::user()->name }} to your cart </p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@if($cartItems->isEmpty())
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Your cart is empty</p>

                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($cartItems as $item)
                            <tr class="table-body-row">
                                <td class="product-remove">
                                    <form action={{route('cart.destroy', $item->id) }} method="POST" class="delete-cart-form">
                                        @csrf
                                        @method('DELETE')
                                        @csrf
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="product-image"><img style="max-height:60px !important" src="{{ asset($item->photo) }}" alt=""></td>
                                <td class="product-name">{{ $item->name }}</td>
                                <td class="product-price">${{ $item->price }}</td>
                                <td class="product-quantity">{{ $item->qty }}</td>
                                <td class="product-total">${{ $item->price * $item->qty }}</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="cart-buttons">
                <a href="/payment?amount={{ $cartItems->sum(function($item) { return $item->price * $item->qty; }) }}" class="boxed-btn">Pay now</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

