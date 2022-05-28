@extends('layout')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="product_box">
                <img src="{{ URL::asset('products_images')}}/{{ $product->image }}" alt="">
                <div class="caption">
                    <h4><a href="{{ route('view_product', $product->id ) }}" class="btn btn-primary btn-block">{{ $product->name }}</a></h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
