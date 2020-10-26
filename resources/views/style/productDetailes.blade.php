@extends("style.index")
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="product-view">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($pro->photo)}}" alt="">
                        </div>
                        @foreach($pics as $pic)
                        <div class="product-view">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($pic->full_file)}}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div id="product-view">
                        <div class="product-view">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($pro->photo)}}" alt="">
                        </div>
                        @foreach($pics as $pic)
                            <div class="product-view">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($pic->full_file)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-body">
                        <div class="product-label">
                            <span>New</span>
                            <?php
                            if($pro->price_offer!=null)
                                echo '<span class="sale">-'.((($pro->price-$pro->price_offer)/$pro->price)*100).'%</span>';
                            else
                                echo'<span class="sale">-'.((($pro->price-$pro->price_offer)/$pro->price)*100).'%</span>';
                            ?>
                        </div>
                        <h2 class="product-name">{{$pro->title}}</h2>
                        <?php
                        if($pro->price_offer!=null)
                            echo '<h3 class="product-price">$'.$pro->price_offer.' <del class="product-old-price">$'.$pro->price.'</del></h3>';
                        else
                            echo' <h3 class="product-price">$'.$pro->price.'</h3>';
                        ?>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>

                                <p><strong>Availability:</strong> {{$pro->stock}}</p>
                                <p><strong>Brand:</strong> {{$pro->trademark_id}}</p>
                                <p>{{$pro->content}}.</p>
                                <div class="product-options">
                                    <ul class="size-option">
                                        <li><span class="text-uppercase">Size:</span></li>
                                        <li class="active"><a href="#">{{$pro->size}} <span>{{$size->name}}</span></a> </li>

                                    </ul>
                                    <ul class="color-option">
                                        <li><span class="text-uppercase">Color:</span></li>
                                        <li class="active"><a href="#" style="background-color:{{$color->color}};"></a></li>


                                    </ul>
                                </div>

                                <form id="addnewcart" method="post">
                                    @csrf
                                    <div class="product-btns">
                                        <div class="qty-input">
                                            <span class="text-uppercase">QTY: </span>
                                            <input class="input" type="number" value="1" name="qty">
                                            <input type="hidden" name="product_id" value="{{$pro->id}}">
                                            <input type="hidden" name="product_name" value="{{$pro->title}}">
                                            <input type="hidden" name="price" value="<?php if($pro->price_offer>0)echo $pro->price_offer; else echo $pro->price; ?>">
                                            <input type="hidden" name="customer_id" value="{{auth()->user()->id}}">
                                        </div>
                                        <button id="adddd" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        <div class="pull-right">
                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="product-tab">
                                <ul class="tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Details</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab1" class="tab-pane fade in active">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                    <div id="tab2" class="tab-pane fade in">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="product-reviews">
                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                            <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                            <div class="review-rating pull-right">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                        </div>
                                                    </div>

                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                            <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                            <div class="review-rating pull-right">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                        </div>
                                                    </div>

                                                    <div class="single-review">
                                                        <div class="review-heading">
                                                            <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                            <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                            <div class="review-rating pull-right">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                        </div>
                                                    </div>

                                                    <ul class="reviews-pages">
                                                        <li class="active">1</li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-uppercase">Write Your Review</h4>
                                                <p>Your email address will not be published.</p>
                                                <form class="review-form">
                                                    <div class="form-group">
                                                        <input class="input" type="text" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="input" type="email" placeholder="Email Address">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="input" placeholder="Your review"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-rating">
                                                            <strong class="text-uppercase">Your Rating: </strong>
                                                            <div class="stars">
                                                                <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                                                                <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                                                                <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                                                                <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                                                                <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="primary-btn">Submit</button>
                                                </form>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /Product Details -->
                </div>
            </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab1">Details</a></li>
                            <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id="tab2" class="tab-pane fade in">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-reviews">
                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <div class="single-review">
                                                <div class="review-heading">
                                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                    <div class="review-rating pull-right">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                </div>
                                            </div>

                                            <ul class="reviews-pages">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-uppercase">Write Your Review</h4>
                                        <p>Your email address will not be published.</p>
                                        <form class="review-form">
                                            <div class="form-group">
                                                <input class="input" type="text" placeholder="Your Name" />
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="email" placeholder="Email Address" />
                                            </div>
                                            <div class="form-group">
                                                <textarea class="input" placeholder="Your review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-rating">
                                                    <strong class="text-uppercase">Your Rating: </strong>
                                                    <div class="stars">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>
    <!-- /container -->
</div>
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
    @foreach($new_products as $item)
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
</div>
    @endsection