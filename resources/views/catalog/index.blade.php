@extends('layout.site')

@section('content')
    
<!-- ##### Breadcumb Area Start ##### -->
        <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Товары</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcumb Area End ##### -->

        <!-- ##### Shop Grid Area Start ##### -->
        <section class="shop_grid_area px-5">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Категории</h6>

                            <!--  Catagories  -->
                            @include('layout.part.roots')
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
  

                            <div class="widget-desc">
                                <h6 class="widget-title mb-30">Сортировать:</h6>
                                <form action="{{route('catalog.allprod')}}" method="get" class="sortby" style="
                                                display: flex;
                                                flex-direction: column;
                                                align-items: flex-start;
                                                justify-content: center;
                                            ">
                                        <div class="sort_wrap" style="
                                                                display: flex;
                                                                align-items: center;
                                                                flex-direction:column;
                                                                justify-content: space-between;
                                                                width: 100%;
                                                                color: #787878;
                                                                margin-bottom:30px;
                                                            ">
                                                            <select name="select" id="sortByselect" class="custom-select" style="
                                                                                                max-width: 90%;
                                                                                                color: #787878;
                                                                                            ">
                                                                <option name='hit'id="hit" value="hit" @isset($selectedhit){{$selectedhit}}@endisset>По хитам</option>
                                                                <option name='hit' id="hit" value="new" @isset($selectednew){{$selectednew}} @endisset>По новинкам</option>
                                                                <option name='hit' id="hit" value="bigsmall" @isset($selectedbigsmall){{$selectedbigsmall}} @endisset>По цене от большего к меньшему</option>
                                                                <option name='hit' id="hit" value="smallbig" @isset($selectedsmallbig){{$selectedsmallbig}} @endisset>По цене от меньшего к большему</option>
                                                            </select>
                                        </div>
                                        <h6 class="widget-title mb-30">Цена</h6>

                                        <div class="sort_wrap" style="
                                                                display: flex;
                                                                align-items: center;
                                                                flex-direction:column;
                                                                justify-content: space-between;
                                                                width: 100%;
                                                                color: #787878;
                                                            ">
                                            <label for="price_from" style="
                                                                display: flex;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                width: 100%;
                                                                max-width: 90%;
                                                                color: #787878;
                                                            ">Цена от
                                                <input type="text" name="price_from" id="price_from"  class="input-group-text" size="6" value="{{request()->price_from}}">
                                            </label>
                                            <br>
                                            <label for="price_to" style="
                                                                display: flex;
                                                                align-items: center;
                                                                justify-content: space-between;
                                                                width: 100%;
                                                                max-width: 90%;
                                                                color: #787878;
                                                            ">До
                                                <input type="text" name="price_to" id="price_to" size="6" class="input-group-text"  value="{{request()->price_to}}">
                                            </label>
                                            <br>
                                            <input type="submit" value="Фильтровать" class="btn btn-primary  essence-btn" style="
                                                                    margin-top: 10px;
                                                                " >
                                        </div>
                                </form>
                            </div>
                        </div>
                        <!-- ##### Single Widget ##### -->
                        @include('layout.part.brands')
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between ">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>@isset($countProd){{$countProd}}@else{{0}}
                                            @endisset
                                        </span>Товаров найдено</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                        </div>


                            <!-- Single Product -->
                            <div class="row">
                                @foreach ($allproduct as $product)
                                    @include('catalog.part.product', ['product' => $product])
                                @endforeach

                            </div>
                            
                            {{$allproduct->links("pagination::bootstrap-4")}}

                    </div>
                </div>
            </div>

        </section>

        <!-- ##### Shop Grid Area End ##### -->
    
@endsection





    