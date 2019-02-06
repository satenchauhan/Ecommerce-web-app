<?php

use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategory();

?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<div class="center pull-right">
							<center><h4 style="color:white; margin-right: -100px;"><img src="{{asset('images/fimages/home/logo1.jpg')}}" alt="Saten E-shop" width="30px;">&nbsp;Saten E-Shop Online Store</h4></center>
						</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('images/fimages/home/logo2.jpg')}}" alt="Saten E-shop" width="100px;" ></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a style="color:#FF7C00;" href="#"><i style="color:#FF7C00;" class="fa fa-star"></i> Wishlist</a></li>
								<li><a style="color:#FF7C00;" href="{{url('/user-view-orders')}}"><i style="color:#FF7C00;" class="fa fa-crosshairs"></i> Orders</a></li>
								<li><a style="color:#FF7C00;" href="{{url('/cart')}}"><i style="color:#FF7C00;" class="fa fa-shopping-cart"></i> Cart</a></li>
							  @if(empty(Auth::check()))
								<li><a style="color:#FF7C00;" href="{{url('/login-register')}}"><i style="color:#FF7C00;" class="fa fa-lock"></i>Login</a></li>
							  @else
								<li><a style="color:#FF7C00;" href="{{url('/account')}}"><i style="color:#FF7C00;" class="fa fa-user"></i> Account</a></li>
								<li><a style="color:#FF7C00;" href="{{url('/user-logout')}}"><i style="color:#FF7C00;" class="fa fa-power-off"></i> Logout</a></li>
							  @endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('/')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    @foreach($mainCategories as $cat)
                                        @if($cat->status=="1")
                                        <li><a href="{{asset('products/'.$cat->url)}} ">{{$cat->category}}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </li> 
								<li><a href="#">Features Item</a></li> 
								<li><a href="#">Latest Fashion</a></li>
								<li><a href="#">Gifts</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group pull-left">
						  <form action="{{url('/search-items')}} " method="post">@csrf
							<input type="text" name="search-item" class="form-control pull-left" placeholder="Search Items..." style="width: 180px;" >
							<button type="submit" class="btn bnt-primary pull-right">Go</button>
						  </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>
	<!--/header-->