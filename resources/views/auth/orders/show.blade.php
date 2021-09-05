@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер теелфона: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                <a href="{{route('catalog.product', ['slug' => $product->slug])}}">
                                        <img height="56px" width="56px"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                    <td><span class="badge">{{$product->pivot->count}}</span></td>
                                <td>{{ $product->price }} грн</td>
                                <td>{{ $product->getPriceForCount()}} грн</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $order->calculateFullSum() }} грн</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
@endsection