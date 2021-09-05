@extends('auth.layouts.master')

@section('title', 'Категория ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Категория {{ $category->name }}</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->content }}</td>
            </tr>
            <tr>
                <td>ParentID</td>
                <td>{{ $category->parent_id }}</td>
            </tr>
            <tr>
                <td>Slug</td>
                <td>{{ $category->slug }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($category->image) }}"
                         height="240px"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection