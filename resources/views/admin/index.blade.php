@extends('layout.admin.master')
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Admin </p>
                    <h2 style="color: white">Welcom {{ Auth::user()->name }} to OurStore</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
