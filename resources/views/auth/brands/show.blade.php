@extends('auth.layouts.master')

@section('title', 'Категория ' . $brand->name)

@section('content')
    <div class="col-md-12">
        <h1>Категория {{ $brand->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $brand->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $brand->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $brand->content }}</td>
            </tr>
            <tr>
                <td>ParentID</td>
                <td>{{ $brand->parent_id }}</td>
            </tr>
            <tr>
                <td>Slug</td>
                <td>{{ $brand->slug }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($brand->image) }}"
                         height="240px"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection