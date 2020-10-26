@extends('style.index')

@section('content')

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">


                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by Price</h3>
                        <div id="price-slider"></div>
                    </div>
                    <!-- aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter By Color:</h3>
                        <ul class="color-option">
                            @foreach( $colors as $color)
                            <li><a href="{{url('customer/products/color_id/'.$color->id)}}" style="background-color:{{$color->color}};"></a></li>
                           @endforeach
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter By Size:</h3>
                        <ul class="size-option">
                            @foreach($sizes as $size)
                            <li class=""><a href="{{url('customer/products/size_id/'.$size->id)}}">{{$size->name}}</a></li>
                          @endforeach

                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by Brand</h3>
                        <ul class="list-links">
                            @foreach($brands as $brand)
                            <li><a href="{{url('customer/products/trademark_id/'.$brand->id)}}">{{$brand->trademark_name}}</a></li>
                           @endforeach
                        </ul>
                    </div>
                    <!-- /aside widget -->



                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top Rated Product</h3>
                        <!-- widget product -->
                        <div class="product product-widget">
                            <div class="product-thumb">
                                <img src="{{'/design/style'}}/img/thumb-product01.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /widget product -->

                        <!-- widget product -->
                        <div class="product product-widget">
                            <div class="product-thumb">
                                <img src="{{'/design/style'}}/img/thumb-product01.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <h3 class="product-price">$32.50</h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /widget product -->
                    </div>
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->

                <!-- MAIN -->
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">Sort By:</span>

                                <select class="input">
                                    <option value="0">Position</option>
                                    <option value="0">Price</option>
                                    <option value="0">Rating</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="page-filter">
                                <span class="text-uppercase">Show:</span>
                                <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                            </div>
                            <ul class="store-pages">
                                <li><span class="text-uppercase">Page:</span></li>
                                <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">
                            <!-- Product Single -->

                        @foreach($products as $item)
                            <!-- Product Single -->
                                <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="product product-single">

                                        <!-- Product Single -->
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <span>New</span>
                                                <span class="sale">-{{(($item->price-$item->price_offer)/$item->price)*100}}%</span>
                                            </div>

                                            <a class="main-btn quick-view" href="{{url('customer/product/details/'.$item->id)}}"><i class="fa fa-search-plus"></i> Quick view</a>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->photo)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <?php
                                            if($item->price_offer!=null)
                                                echo '<h3 class="product-price">$'.$item->price_offer.' <del class="product-old-price">$'.$item->price.'</del></h3>';
                                            else
                                                echo' <h3 class="product-price">$'.$item->price.'</h3>';
                                            ?>                                <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                            <h2 class="product-name"><a href="{{url('customer/product/details/'.$item->id)}}">{{$item->title}}</a></h2>
                                            <div class="product-btns">
                                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>

                                                    <a href="{{url('customer/product/details/'.$item->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>

                                <!-- /Product Single -->

                                </div>

                        @endforeach
                            <!-- /Product Single -->


                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="sort-filter">
                                <span class="text-uppercase">Sort By:</span>
                                <select class="input">
                                    <option value="0">Position</option>
                                    <option value="0">Price</option>
                                    <option value="0">Rating</option>
                                </select>
                                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="page-filter">
                                <span class="text-uppercase">Show:</span>
                                <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                            </div>
                            <ul class="store-pages">
                                <li><span class="text-uppercase">Page:</span></li>
                                <li class="active">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

@endsection