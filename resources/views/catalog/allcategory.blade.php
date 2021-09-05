@extends('layout.site')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($roots as $category)
                @include('catalog.part.category')
            @endforeach
        </div>  
    </div>

@endsection