@extends('layout.admin.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p> Welcom {{ Auth::user()->name }}</p>
                    <h1>products list</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@if($row->isEmpty())
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Products list</h1>
                    <p>Opps no products</p>

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

                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Delete</th>
                                <th class="product-total">modify</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($row as $item)
                            <tr class="table-body-row" id="cart-item-{{ $item->id }}">
                                <td class="product-image"><img style="max-height:60px !important" src="{{ asset($item->photo) }}" alt=""></td>
                                <td class="product-name">{{ $item->name }}</td>
                                <td class="product-price">${{ $item->price }}</td>
                                <td class="product-quantity">{{ $item->quantity }}</td>
                                <td class="product-total">
                                <div class="cart-buttons">
                                    <form action={{route('product.delet',$item->id)}} method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-danger" >delet</button>
                                </form>
                                </div>
                            </td>
                                <td class="product-total">
                                    <div class="cart-buttons">
                                        <form action={{route('product.edit',$item->id)}} method="GET">

                                        @csrf
                                        <button class="btn btn-primary" >modify</button>
                                    </form>
                                    </div>
                            </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endif
@endsection
