@extends('layouts.frontLayout.front-index')
@section('content')

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($banners as $key => $banner)
							  <li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
							@endforeach
						</ol>						
						<div class="carousel-inner">
						  @foreach($banners as $key => $banner)
						   <div class="item @if($key==0) active @endif">
							<a href="{{$banner->link}}" title="{{$banner->title}}"> <img src="{{asset('images/fimages/banners/'.$banner->image)}}"  alt="E-Shop"></a>
						   </div>
						  @endforeach					
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-sm" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-sm" data-slide="next">
						<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!--/slider-->	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-products-->                        
							<div class="panel panel-default">
								<?php //echo $categories_menu; ?>
								@foreach($categories as $cat)
								<div class="panel-heading">
									<h4 class="panel-title">
									@if($cat->status=="1")
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$cat->category}}
										</a>
								    @endif
									</h4>
								</div>
								<div id="{{$cat->id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										 @foreach($cat->categories as $subcat)
										   @if($subcat->status=="1")
											<li><a href="{{asset('/products/'.$subcat->url)}}">{{$subcat->category}}</a></li>
										   @endif
										 @endforeach
										</ul>
									</div>
								</div>
							@endforeach
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->	
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Prada</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Gucci</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Armani</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Nike</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Reebok</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Polo</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Swatch</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						<div class="price-range"><!--price-range-->
						  <h2>Price Range</h2>
							<div class="well text-center">
							   <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							   <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->	
					</div>
				</div>
				<div class="col-lg-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($allproducts as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="width:220px; height: 270px;" src="{{asset('images/bimages/products/small/'.$product->image)}}" alt="">
											<h2>INR {{$product->price}}</h2>
											<p>{{$product->product_name}}</p>
											<a  href="{{url('/product/'.$product->id)}}"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					    @endforeach
				    </div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>

@endsection