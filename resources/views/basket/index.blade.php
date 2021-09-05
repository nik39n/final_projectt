@extends('layout.site')

@section('content')
    <div class="container mb-5 pt-5">
        <h1 class="mb-5">Ваша корзина</h1>
            @php
                $basketCost = 0;
            @endphp
            <div class="table-responsive-sm">
                <table class="table table-bordered table_edit_style">
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Стоимость</th>
                        <th></th>
                    </tr>
                    @foreach($order->products as $product)
                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('catalog.product', [$product->slug]) }}">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td>{{ number_format($product->price, 2, '.', '') }}</td>
                            <td>
                                <div class="btn-count">
                                    <form action="{{route('basket-remove', $product)}}"
                                        method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fas fa-minus-square"></i>
                                        </button>
                                    </form>
                                    <span class="mx-1">{{$product->pivot->count}}</span>
                                    <form action="{{route('basket-add', $product)}}"
                                        method="post" class="d-inline">
                                        @csrf
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{number_format($product->getPriceForCount(), 2, '.', '')}}</td>
                            <td>
                                <form action="{{route('basket-clear', $product )}}"
                                    method="post">
                                    @csrf
                                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Итого</th>
                        <th>{{number_format($order->getFullPrice(), 2, '.', '')}}</th>
                        <th></th>
                    </tr>
                    
                </table>
            </div>
            
           
            <div class="btn-group pull-right">
                        <a type="button" href="{{route('basket-place')}}"  class="btn btn-success" style="
    font-size: 16px;
    font-weight: 400;
" style="
    font-size: 16px;
    font-weight: 500;
">Оформить заказ</a>
            </div>

    </div>

@endsection