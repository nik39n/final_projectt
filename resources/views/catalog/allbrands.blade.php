@extends('layout.site')

@section('content')

   <div class="container">
    <div class="row">
            @foreach ($brands as $brand)
                @include('catalog.part.brand')
            @endforeach
        </div>
   </div>

@endsection