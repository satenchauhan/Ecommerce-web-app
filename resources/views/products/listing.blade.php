@extends('layouts.frontLayout.front-index')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				   @include('layouts.frontLayout.sidebar')
				 </div>	
				 <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">
					  {{-- Search function for itam --}}
						   @if(!empty($search_item))
							{{ $search_item}} Item
						   @else
						     {{ $category_data->category}} Items
						   @endif
							 </h2>
						 
						@foreach($allproducts as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{asset('images/bimages/products/small/'.$product->image)}}" alt="" width="50px" />
										<h2>INR {{$product->price}}</h2>
										<p>{{$product->product_name}}</p>
										<a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
					</div><!--Category and subcategory items-->
				</div>
			</div>
		</div>
	</section>
@endsection