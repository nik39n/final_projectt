@extends('auth.layouts.master')

@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
        <div class="table-responsive-sm">
            <table class="table">
                <tbody>
                <tr>
                    <th>
                        ID
                    </th>

                    <th>
                        Название
                    </th>
                    <th>
                        Категория
                    </th>
                    <th>
                        Цена
                    </th>
                    <th>
                        Количество
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id}}</td>
                        <td>{{ $product->name }}</td>
                        <td>@isset($product->getCategory()->name)
                            {{$product->getCategory()->name}}
                        @else
                            Нет категории
                        @endisset
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->count }}</td>

                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                    <a class="btn btn-success" style="font-size: 16px;font-weight: 400;" type="button"
                                    href="{{ route('products.show', $product) }}">Открыть</a>
                                    <a class="btn btn-warning" style="font-size: 16px;font-weight: 400;" type="button"
                                    href="{{ route('products.edit', $product) }}">Редактировать</a>
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" style="font-size: 16px;  font-weight: 400;" type="submit" value="Удалить"></form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$products->links("pagination::bootstrap-4")}}
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">Добавить товар</a>
    </div>
@endsection