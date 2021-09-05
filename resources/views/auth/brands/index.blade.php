@extends('auth.layouts.master')
@section ('title' , 'Заказы')
@section('content')
    <div class="col-md-12">
        <h1>Бренды</h1>
        <div class="table-responsive-sm">
            <table class="table">
                <tbody>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>
                        Название
                    </th>
                    <th>
                        Действия
                    </th>
                </tr>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->slug}}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                                    <a class="btn btn-success" style="font-size: 16px;font-weight: 400;" type="button" href="{{ route('brands.show', $brand) }}">Открыть</a>
                                    <a class="btn btn-warning" style="font-size: 16px;font-weight: 400;" type="button" href="{{ route('brands.edit', $brand) }}">Редактировать</a>
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" style="font-size: 16px;font-weight: 400;"
    font-size: 16px;
    font-weight: 500;
" type="submit" value="Удалить"></form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-success" type="button"
           href="{{route('brands.create')}}">Добавить бренд</a>
    </div>
@endsection