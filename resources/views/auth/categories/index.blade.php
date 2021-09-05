@extends('auth.layouts.master')
@section ('title' , 'Заказы')
@section('content')
    <div class="col-md-12">
        <h1>Категории</h1>
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->slug}}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                    <a class="btn btn-success" style="font-size: 16px;font-weight: 400;" type="button" href="{{ route('categories.show', $category) }}">Открыть</a>
                                    <a class="btn btn-warning" style="font-size: 16px;font-weight: 400;" type="button" href="{{ route('categories.edit', $category) }}">Редактировать</a>
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" style="font-size: 16px; font-weight: 400;" type="submit" value="Удалить"></form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$categories->links("pagination::bootstrap-4")}}
        <a class="btn btn-success" type="button"
           href="{{route('categories.create')}}">Добавить категорию</a>
    </div>
@endsection