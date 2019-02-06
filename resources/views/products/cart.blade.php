@extends('layouts.frontLayout.front-index')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
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
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="size">Size</td>
							<td class="price">&nbsp;Price</td>
							<td class="quantity">&nbsp;&nbsp;&nbsp;Quantity</td>
							<td class="total">&nbsp;&nbsp;&nbsp;&nbsp;Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $total_amount = 0;  ?>
						@foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width: 70px;" src="{{asset('images/bimages/products/small/'.$cart->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product_name}}</a></h4>
								<p>Product Code: {{$cart->product_code}}</p>	
							</td>
							<td class="cart_size">
								<p>{{$cart->size}}</p>
							</td>
							<td class="cart_price">
								<p>INR {{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart/add-quantity/'.$cart->id.'/1') }}" title="Add More Quantity"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" title="Add More Quantity" autocomplete="off" size="2">
									@if($cart->quantity > 1)
									<a class="cart_quantity_down" href="{{url('/cart/add-quantity/'.$cart->id.'/-1') }}" title="Decrease Quantity"> - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">INR {{$cart->price*$cart->quantity}}</p>
							</td>
							<td class="cart_delete" style="margin-left: -18px; margin-top: -10px;">
								<a class="cart_quantity_delete" href="{{url('/cart/delete-item/'.$cart->id)}}"><i class="fa fa-times" title="Delete Item"></i></a>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price * $cart->quantity); ?>
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code you want to use</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							
							<li>
							  <form action="{{url('cart/apply-coupon')}}" method="post">@csrf
								<label>Use Coupon Code &nbsp;</label>
								<input type="text" name="coupon_code">&nbsp;
								<input type="submit" name="" value="&nbsp;Apply&nbsp;"  class="btn btn-info btn-small" style="height: 29px;">
							  </form>
							  @if($errors->any())
						  
						       @foreach($errors->all() as $error)
						       <span style="color: red; margin-left: 130px;">{{$error}}</span>
						       @endforeach
						     @endif
							</li>				
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
				   <div class="total_area">
					  <ul>
					  @if(!empty(Session::get('coupon_amount')))
						<li>Sub Total <span>INR <?php echo $total_amount; ?>.00</span></li>
						<li>Coupon Discount <span>INR <?php echo Session::get('coupon_amount'); ?>.00</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Grand Total <span>INR <?php echo $total_amount - Session::get('coupon_amount'); ?>.00</span></li>
					  @else
						<li>Grand Total <span>INR <?php echo $total_amount; ?>.00</span></li>
					  @endif
					  </ul>
						<a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
				   </div>
				</div>
			</div>
		</div>
	</section>
	<!--/#do_action-->

@endsection