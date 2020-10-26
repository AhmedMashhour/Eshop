<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>E-SHOP HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{'/design/style'}}/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{'/design/style'}}/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="{{'/design/style'}}/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{'/design/style'}}/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{'/design/style'}}/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{'/design/style'}}/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>
<!-- HEADER -->
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to E-shop!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="#">Store</a></li>
                    <li><a href="#">Newsletter</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">English (ENG)</a></li>
                            <li><a href="#">French (FR)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            @foreach($countries as $country)
                            <li><a href="#">{{$country->currency}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="#">
                        <img src="{{url('design/style')}}/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form method="post" action="{{url('customer/search')}}">
                        @csrf
                        <input class="input search-input" type="text" name="keyword" placeholder="Enter your keyword">
                        <select class="input search-categories" name="department">
                            <option value="">All Categories</option>
                           @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                               @endforeach
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                        </div>
                        @if(!auth()->guard("customer")->check())
                        <a href="{{url('customer/login')}}" class="text-uppercase">Login</a> / <a href="{{url('customer/register')}}" class="text-uppercase">Join</a>
                        @endif
                            <ul class="custom-menu">
                                @if(auth()->guard("customer")->check())
                            <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                                @endif
                            <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                            <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                                @if(!auth()->guard("customer")->check())
                            <li><a href="{{url('customer/login')}}"><i class="fa fa-unlock-alt"></i> Login</a></li>
                            <li><a href="{{url('customer/register')}}"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                                @endif
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{count($cart)}}</span>
                            </div>
                            <strong class="text-uppercase">My Cart:</strong>
                            <br>
                            <?php $amount=0;
                            foreach ($cart as $item){
                                if ($item->price_offer>0)
                                $amount+=$item->price_offer;
                                else
                                    $amount+=$item->price;
                            }
                            echo '<span>'.$amount.'$</span>';
                                ?>


                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    @foreach($cart as $item)
                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <?php
                                            $p=\App\Product::find($item->product_id);
                                            ?>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($p->photo)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <?php
                                            if($item->price_offer!=null)
                                                echo '<h3 class="product-price">$'.$item->price_offer.'<span class="qty">X'.$item->qty.'</span> </h3>';
                                            else
                                                echo' <h3 class="product-price">$'.$item->price.'<span class="qty">X'.$item->qty.'</span></h3>';
                                            ?>
                                            <h2 class="product-name"><a href="{{url('customer/product/details/'.$item->product_id)}}">{{$item->product_name}}</a></h2>
                                        </div>
                                        <a href="{{url('customer/delete/from/cart/'.$item->id)}}" class="cancel-btn"><i class="fa fa-trash"></i></a>
                                    </div>
                                   @endforeach
                                </div>
                                <div class="shopping-cart-btns">
                                    <button class="main-btn">View Cart</button>
                                    <button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->