@extends('layout.admin.master')
@section('content')

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p> Welcom {{ Auth::user()->name }}</p>
                    <h1> Edit products</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                      <div class="card single-accordion">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                          </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="billing-address-form">


                                @foreach ($product as $item )
                                <form action="{{route('product.edit',$item->id)}}" method="POST">
                                    @method('PUT')
                                    <p><input type="text" value="{{$item->name}}" placeholder=""></p>

                                    <p>price:<input type="number" name="price" value="{{$item->price}}" min="0"></p>
                                    <p>qty:<input type="number" name="qty"  value="{{$item->quantity}}" min="1" ></p>

                                        <p class="a">category:<select>
                                            <option value="{{$item->category_id}}">{{$item->title}}</option>
                                            @foreach ($categories as $row )
                                              <option value="{{$row->id}}">{{$row->title}}</option>
                                            @endforeach
                                        </select></p>

                                    <p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="decreption" value="">{{$item->decreption}}</textarea></p>
                                    <button class="btn btn-success" >Edit</button>
                                </form>
                                @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
