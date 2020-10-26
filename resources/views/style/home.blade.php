@extends('style.index')

@section('content')




    <!-- HOME -->
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{url('design/style')}}/img/banner01.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h1>Bags sale</h1>
                            <h3 class="white-color font-weak">Up to 50% Discount</h3>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{url('design/style')}}/img/banner02.jpg" alt="">
                        <div class="banner-caption">
                            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{url('design/style')}}/img/banner03.jpg" alt="">
                        <div class="banner-caption">
                            <h1 class="white-color">New Product <span>Collection</span></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{url('design/style')}}/img/banner10.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{url('design/style')}}/img/banner11.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <a class="banner banner-1" href="#">
                        <img src="{{url('design/style')}}/img/banner12.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Deals Of The Day</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{url('design/style')}}/img/banner14.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->


                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">

                            <!-- Product Single -->
                            @foreach($products as $item)
                                @if($item->price_offer>0)
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <span>New</span>
                                                <span class="sale">-{{(($item->price-$item->price_offer)/$item->price)*100}}%</span>
                                            </div>
                                            <ul class="product-countdown">
                                                <li><span>00 H</span></li>
                                                <li><span>00 M</span></li>
                                                <li><span>00 S</span></li>
                                            </ul>
                                            <a class="main-btn quick-view" href="{{url('customer/product/details/'.$item->id)}}"><i class="fa fa-search-plus"></i> Quick view</a>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->photo)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">${{$item->price_offer}} <del class="product-old-price">${{$item->price}}</del></h3>
                                            <div class="product-rating">
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
                            @endif
                        @endforeach

                            <!-- /Product Single -->






                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Deals Of The Day</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-2 custom-dots">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single product-hot">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-20%</span>
                            </div>
                            <ul class="product-countdown">
                                <li><span>00 H</span></li>
                                <li><span>00 M</span></li>
                                <li><span>00 S</span></li>
                            </ul>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="{{url('design/style')}}/img/product01.jpg" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Slick -->
                <div class="col-md-9 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-2" class="product-slick">
                        <?php
                        $a=0;
                        ?>
                        @foreach($products as $item)

                            <!-- Product Single -->
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <span>New</span>
                                            <span class="sale">-{{(($item->price-$item->price_offer)/$item->price)*100}}$</span>
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
                                        ?>
                                        <div class="product-rating">
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
                            <?php
                            $a++;
                            if ($a==6)
                            {
                                break;
                            }
                            ?>

                            <!-- /Product Single -->

                            @endforeach





                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-8">
                    <div class="banner banner-1">
                        <img src="{{url('design/style')}}/img/banner13.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{url('design/style')}}/img/banner11.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6">
                    <a class="banner banner-1" href="#">
                        <img src="{{url('design/style')}}/img/banner12.jpg" alt="">
                        <div class="banner-caption text-center">
                            <h2 class="white-color">NEW COLLECTION</h2>
                        </div>
                    </a>
                </div>
                <!-- /banner -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Latest Products</h2>
                    </div>
                </div>
                <!-- section title -->
            <?php
            $a=0;
            ?>
            @foreach($products as $item)
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">

                        <!-- Product Single -->
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>New</span>
                                        <span class="sale">-{{(($item->price-$item->price_offer)/$item->price)*100}}$</span>
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
                                    ?>
                                    <div class="product-rating">
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
                        <?php
                        $a++;
                        if ($a==4)
                        {
                            break;
                        }
                        ?>
                        <!-- /Product Single -->

                </div>

                        @endforeach

                <!-- /Product Single -->
            </div>

            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- banner -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="banner banner-2">
                        <img src="{{url('design/style')}}/img/banner15.jpg" alt="">
                        <div class="banner-caption">
                            <h2 class="white-color">NEW<br>COLLECTION</h2>
                            <button class="primary-btn">Shop Now</button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
            <?php
            $a=0;
            ?>
            @foreach($products as $item)
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">

                        <!-- Product Single -->
                        <div class="product-thumb">
                            <div class="product-label">
                                <span>New</span>
                                <span class="sale">-{{(($item->price-$item->price_offer)/$item->price)*100}}$</span>
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
                            ?>                            <div class="product-rating">
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
                </div>
                <!-- /Product Single -->
                    <?php
                    $a++;
                    if ($a==3)
                    {
                        break;
                    }
                    ?>
              @endforeach
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Picked For You</h2>
                    </div>
                </div>
            <?php
            $a=0;
            ?>
            @foreach($products as $item)
                <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">

                            <!-- Product Single -->
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale">-{{(($item->price-$item->price_offer)/$item->price)*100}}$</span>
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
                    <?php
                    $a++;
                    if ($a==4)
                    {
                        break;
                    }
                    ?>
                    <!-- /Product Single -->

                    </div>

                @endforeach

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->



@endsection