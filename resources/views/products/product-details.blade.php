@extends('layouts.frontLayout.front-index')
@section('content')
	<section>
		<div class="container">
			@if(session()->has("error"))
			    <div class="alert alert-danger" style="color: red;">
			       <h5>{{ session()->get("error")}}</h5>
			    </div>
			@endif
			@if(session()->has("success"))
			    <div class="alert alert-success">
			       <h5 style="color: green">{{ session()->get("success")}}</h5>
			    </div>
			@endif
			<div class="row">
				<div class="col-sm-3">
				  @include('layouts.frontLayout.sidebar')
				</div>				
				 <div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							  <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
							  	<a href="{{asset('images/bimages/products/large/'.$productInfo->image)}}">
								  <img  class="mainImage" style="width:350px; height: 400px;" src="{{asset('images/bimages/products/medium/'.$productInfo->image)}}" alt=""  />
								</a>
							  </div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
									  <div class="item active thumbnails">
									  	 <a href="{{asset('images/bimages/products/large/'.$productInfo->image)}}"  data-standard="{{asset('images/bimages/products/small/'.$productInfo->image)}}" />
										   <img class="changeImage" src="{{asset('images/bimages/products/small/'.$productInfo->image)}}" alt="" style="width:60px; cursor: pointer;" />
										 </a>
									  	@foreach($productAltImage as $altImage)
									  	 <a href="{{asset('images/bimages/products/large/'.$altImage->image)}}" data-standard="{{asset('images/bimages/products/small/'.$altImage->image)}}">
									       <img class="changeImage" src="{{asset('images/bimages/products/small/'.$altImage->image)}}" alt="" style="width:60px; cursor: pointer;" />
									     </a>
										@endforeach
									  </div>										
									</div>
								  <!-- Controls -->
								  {{-- <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a> --}}
							</div>
						 </div>
						<div class="col-sm-7">
							<form name="addcartform" id="addcartform" action="{{url('add-cart')}}" method="post">@csrf
							   <input type="hidden" name="product_id" value="{{$productInfo->id}}">
							   <input type="hidden" name="product_name" value="{{$productInfo->product_name}}">
							   <input type="hidden" name="product_code" value="{{$productInfo->product_code}}">
							   <input type="hidden" name="product_color" value="{{$productInfo->product_color}}">
							   <input type="hidden" name="price" value="{{$productInfo->price}}">
							<div class="product-information"><!--/product-information-->
								<img src="{{asset('images/fimages/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$productInfo->product_name}}</h2>
								<p>Product ID: {{$productInfo->product_code}}</p>
								<p>
							  <select id="select_size" name="size" style="width: 130px;" required>
								<option value="">Select Size</option>
								@foreach($productInfo->attributes as $detail)
								<option value="{{$productInfo->id}}-{{ $detail->size}}">{{ $detail->size}}</option>
								@endforeach
							  </select>
								</p>
								<span>
									<label>Quantity:</label>
									<input type="text" name="quantity" value="1" /><br><br>
									<span id="get-price">INR {{$productInfo->price}}</span>
									@if($total_stock > 0)
									 <button type="submit" class="btn btn-fefault cart" id="cart-button">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									 </button>
									@endif
								</span>
								<p> <b>Availability :</b>&nbsp;<span  id="get-stock">	@if($total_stock > 0) In Stock @else Out of Stock @endif</span></p>				
								<p><b>Condition:</b> New</p>
								{{-- <p><b>Brand :</b> Nike</p> --}}
								<p><b>Rated:</b>&nbsp;<img src="{{asset('images/fimages/product-details/rating.png')}}" alt="" /></p>
								<a href=""><img src="{{asset('images/fimages/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
							 </div><!--/product-information-->
						    </form> 
						</div>
					</div><!--/product-details-->
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active in"><a href="#description" data-toggle="tab">Description</a></li>
								<li><a href="#care" data-toggle="tab">Material & Care</a></li>
								<li><a href="#delivery" data-toggle="tab">Delivery Option</a></li>	
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="description" >
							   <div class="col-sm-12">
								<p>{{$productInfo->description}} </p>	
							   </div>								
							</div>
							<div class="tab-pane fade" id="care" >
							   <div class="col-sm-12">
								<p>{{$productInfo->care}}</p>	
							   </div>								
							</div>							
							<div class="tab-pane fade" id="delivery" >
							   <div class="col-sm-12">
								<p>100% Original Product</p><br>
								<p>Free Delivery on order above Rs. 599</p><br>
								<p>Cash on deliver</p><br>
								<p>Easy 30 days returns & 30 days exchanges</p>		
							   </div>								
							</div>							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count =1; ?>
							  @foreach ($relatedProducts->chunk(3) as $chunk)
								<div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>>
								  @foreach ($chunk as $item)	
								    <div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width:150px; height: 200px;" src="{{asset('images/bimages/products/small/'.$item->image)}}" alt=""  />
													<h2>INR {{$item->price}}</h2>
													<p>{{$item->product_name}}</p>
													<a href="{{url('product/'.$item->id)}}">
													 <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													</a>
												</div>
											</div>
										</div>
								    </div>
								  @endforeach
								</div>
							   <?php $count++; ?>
							  @endforeach
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
@endsection

