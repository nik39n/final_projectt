@extends('layout.site')

@section('content')

    <div class="container">
            @foreach ($allproduct->products as $product)
                @include('catalog.part.product')
            @endforeach
    </div>

@endsection