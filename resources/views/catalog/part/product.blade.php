    <div class="col-12 col-sm-10 col-lg-4">
        <div class="single-product-wrapper">
            <!-- Product Image -->
            <div class="product-img" style="
                                text-align: center;">
                <div class="labels">
                    @if($product->isNew())
                            <span class="badge badge-success">Новинка</span>
                    @endif
                    @if($product->isRecommend())
                            <span class="badge badge-warning">Рекомендуемое</span>
                    @endif
                    @if($product->isHit())
                            <span class="badge badge-danger">Хит</span>
                    @endif
                </div>
                <div class="img-wrapper" style="max-width:fit-content">
                    <img src="{{Storage::url($product->image)}}" alt=""  >
                </div>
                

                <!-- Product Badge -->
                

                
            </div>
            <!-- Product Description -->
            <div class="add-to-cart-btn">
                @if($product->isAvailable())
                    <form action="{{ route('basket-add', $product) }}" 
                        method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn essence-btn">Add to Cart</button>
                    </form>
                @else 
                  Нет в наличии
                @endif
            </div>
            <div class="product-description">
                <span>@isset($product->brand->name){{ $product->brand->name }}@else @endisset</span>
                <a href="{{route('catalog.product', ['slug' => $product->slug])}}">
                    <h6>{{ $product->name }}</h6>
                </a>
                <p class="product-price">${{ $product->price }}</p>

            </div>
        </div>
    </div>