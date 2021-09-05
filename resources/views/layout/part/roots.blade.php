<div class="widget brands">
    <div class="widget-desc">
        <ul>
            <!-- Single Item -->
            @foreach($items as $item)
            @if ($item->parent_id == 0)
            <li>
                <a href="{{ route('catalog.category', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>