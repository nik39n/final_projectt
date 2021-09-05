@extends('layout.site')
@section('title', 'Оформить заказ')
@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>Подтвердите заказ:</h1>
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-12 mb-3 p-0">Общая стоимость заказа: <b>{{$order->getFullPrice()}}</b></div>

                    <form action="{{route('basket-confirm')}}" method="POST">
                        <div class="">
                            <p>Укажите свои имя и номер телефона, чтобы наш оператор мог связаться с вами</p>
                            <div class="container pl-0 pt-4 pb-4">
                                <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-4 pl-0">Имя:</label>
                                    <div class="col-lg-8 pl-0">
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-4 pl-0">Номер телефона:</label>
                                    <div class="col-lg-8 pl-0">
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- @guest
                                <div class="form-group">
                                    <label for="email" class="control-label col-lg-offset-3 col-lg-4">E-mail:</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                            @endguest -->
                            <input type="hidden" name="_token" value="">
                            @csrf
                            <input type="submit" class="btn btn-success" href="" value="Подтвердить заказ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection