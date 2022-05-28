@extends('layout')

@section('content')

<div class="row">
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="product_box">
                <img src="{{ URL::asset('products_images')}}/{{ $products->image }}" alt="">
                <div class="caption">
                    <h4>{{ $products->name }}</h4>
                    <p>{{ $products->description }}</p>
                    <p><strong>Price: </strong> {{ $products->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $products->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
</div>

@endsection
