<div class="widget brands mb-50">
    <!-- Widget Title 2 -->
    <h5 class=" mb-30">Бренды</h5>
    <div class="widget-desc">
        <ul>
            @foreach($items as $item)
                <li>
                    <a href="{{ route('catalog.brand', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                    <!-- <span class="badge badge-dark float-right">{{ $item->products_count }}</span> -->
                </li>
            @endforeach
        </ul>
    </div>
</div>