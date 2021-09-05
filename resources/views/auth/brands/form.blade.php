@extends('auth.layouts.master')

@isset($brand)
    @section('title', 'Редактировать бренд' . $brand->name)
@else
    @section('title', 'Создать бренд')
@endisset


@section('content')
    <div class="col-md-12">
        @isset($brand)
            <h1>Редактировать бренд <b>{{ $brand->name }}</b></h1>
                @else
                    <h1>Добавить бренд</h1>
                @endisset

                <form method="POST" enctype="multipart/form-data"
                      @isset($brand)
                      action="{{ route('brands.update', $brand) }}"
                      @else
                      action="{{ route('brands.store') }}"
                    @endisset
                >
                    <div>
                        @isset($brand)
                            @method('PUT')
                        @endisset
                        @csrf
                        
                        <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name :</label>
                            <div class="col-sm-6">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="name" id="name"
                                       value="@isset($brand){{ $brand->name }}@endisset">
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <label for="content" class="col-sm-2 col-form-label">Content :</label>
                            <div class="col-sm-6">
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
							<textarea name="content" id="content" cols="40" rows="5" >@isset($brand){{ $brand->content }}@endisset</textarea>
                            </div>
                        </div>
                        <br>

                            <div class="input-group row">
                                <label for="slug" class="col-sm-2 col-form-label">slug</label>
                                <div class="col-sm-6">
                                    @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea name="slug" id="slug">@isset($brand){{ $brand->slug }}@endisset</textarea>
                                </div>
                            </div>
                            <br>

                        <div class="input-group row">
                            <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                            <div class="col-sm-10">
                                <label class="btn btn-default btn-file">
                                    Загрузить <input type="file" style="display: none;" name="image" id="image">
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-success" style="
    font-size: 16px;
    font-weight: 400;
" style="
    font-size: 16px;
    font-weight: 500;
">Сохранить</button>
                    </div>
                </form>
    </div>
@endsection