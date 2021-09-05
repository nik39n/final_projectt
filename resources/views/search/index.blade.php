@extends('layout.site')

@section('content')
    @if(count($menings))
        <div class="container">
            <div class="row">
                @foreach ($menings as $product)
                    @include('catalog.part.product')
                @endforeach
            </div>  
        </div>
        {{$menings->links("pagination::bootstrap-4")}}
    @else   
        <div class="container">
            <div class="row">
                <h2 style="margin-bottom: 100px;margin-top: 100px;">Товаров не найдено</h2>
            </div>
        </div>
    @endif
@endsection