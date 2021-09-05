<div class="col-md-6 mb-4">
    <div class="card" style="
    height: 100%;">
        <div class="card-header">
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="card-body p-0" style="
                display: flex;
                justify-content: center;
                align-items: center;
            ">
            <img src="{{Storage::url($category->image)}}" alt="" class="img-fluid">
        </div>
        <div class="card-footer">
            <a href="{{ route('catalog.category', ['slug' => $category->slug]) }}"
               class="btn btn-dark" style="
    font-size: 16px;
    font-weight: 500;
">Перейти в раздел</a>
        </div>
    </div>
</div>

