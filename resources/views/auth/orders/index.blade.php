@extends('auth.layouts.master')
@section ('title' , 'Заказы')
@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <div class="table-responsive-sm">
            <table class="table">
                <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Имя
                    </th>
                    <th>
                        Телефон
                    </th>
                    <th>
                        Когда отправлен
                    </th>
                    <th>
                        Сумма
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
                @foreach($orders as $order)
                <tr>
                <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at->format('H:i d/m/y')}}</td>
                    <td>{{$order->calculateFullSum()}}грн</td>
                    <td>
                        <div class="btn-group" role="group">
                            @admin
                                <a class="btn btn-success" style="font-size: 16px;    font-weight: 400;" type="button" href="{{route('orders.show', $order)}}">Открыть</a>
                            @else
                                <a class="btn btn-success"  style="font-size: 16px;    font-weight: 400;" type="button" href="{{route('person.orders.show', $order)}}">Открыть</a>
                            @endadmin
                            <!-- <a class="btn btn-success" type="button" href="{{route('orders.show', $order)}}">Открыть</a> -->
                        </div>
                    </td>
                </tr>
                @endforeach
                    
                </tbody>
            </table>    
        </div>
        {{$orders->links("pagination::bootstrap-4")}}
    </div>
@endsection
