@extends('layouts.frontLayout.front-index')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Review</li>
				</ol>
			</div>
			<div class="row" style="margin-top: -40px;">	
				<div class="col-sm-4 col-sm-offset-1 table-bordered">
					<div class="login-form form-group" >
					  <h2 align="center" style="margin-top: 10px;">Billing Details</h2>
					    <div class="form-group">
					       <label class="form-conctrol">Billing Name:</label>	
					    	{{$user_data->name}}		  
						</div>
						<div class="form-group">
						   <label class="form-conctrol"> Address:</label>	
						   {{$user_data->address}}
						</div>
						<div class="form-group">
							<label class="form-conctrol"> City:</label>	
						 {{$user_data->city}}
						</div>
						<div class="form-group">
						   <label class="form-conctrol"> State:</label>	
						   {{$user_data->state}}
						</div>
						<div class="form-group">
					       <label class="form-conctrol"> Country:</label>	
						   {{$user_data->country}}
						</div>
						<div class="form-group">
							<label class="form-conctrol"> Pincode:</label>	
						   {{$user_data->pincode}}
						</div>
						<div class="form-group">
							<label class="form-conctrol"> Mobile:</label>	
						    {{$user_data->mobile}}
					    </div>
					</div><br>
				</div>
				<div class="col-sm-1">
					<h2 class="center">&nbsp;&nbsp;</h2>
				</div>
				<div class="col-sm-4 table-bordered">
					<div class="signup-form form-group"><!--sign up form-->
					<h2 align="center" style="margin-top: 10px;">Shipping Details</h2>
						 <div class="form-group">
						   <label class="form-conctrol">  Name:</label>	
						   {{$shippingData->name}}
						</div>
						<div class="form-group">
						   <label class="form-conctrol">  Address:</label>	
						   {{$shippingData->address}}
						</div>
						<div class="form-group">
						   <label class="form-conctrol">  City:</label>	
						   {{$shippingData->city}}
						</div>
						<div class="form-group">
						   <label class="form-conctrol">  State:</label>	
						   {{$shippingData->state}}
						</div>
						<div class="form-group">
						   <label class="form-conctrol">  Country:</label>	
						   {{$shippingData->country}}
						</div>
						<div class="form-group">
						   <label class="form-conctrol">  Pincode:</label>	
						   {{$shippingData->pincode}}
						</div>
						<div class="form-group">
						  <label class="form-conctrol">  Mobile:</label>	
						   {{$shippingData->mobile}}
					    </div>				
					</div><br>
				</div>				
			</div>

				<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="size">Size</td>
							<td class="price">&nbsp;Price</td>
							<td class="quantity">&nbsp;&nbsp;&nbsp;Quantity</td>
							<td align="right" class="total">&nbsp;&nbsp;&nbsp;Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0;  ?>
						@foreach($user_cart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width: 70px;" src="{{asset('images/bimages/products/small/'.$cart->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product_name}}</a></h4>
								<p>Product Code: {{$cart->product_code}}</p>	
							</td>
							<td class="cart_size">
								<h4 style="margin-left: -5px;">{{$cart->size}}</h4>
							</td>
							<td class="cart_price">
								<h4 style="margin-left: 6px;">{{$cart->price}}</h4>
							</td>
							<td class="cart_quantity">
							   <div class="cart_quantity_button" style="margin-left: 30px;">
								 {{$cart->quantity}}
							   </div>
							</td>
							<td class="cart_total" style="margin-right: 20px; color: #FE980F;">
								<h4 class="pull-right">INR {{$cart->price*$cart->quantity}}</h4>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						@endforeach
						<tr>
							<table class="table table-condensed total-result">
							 <div class="col-sm-6 pull-right">
							   <div class="total_area">
								  <ul>
									<li>Sub Total <span>INR {{$total_amount}}.00</span></li>
									<li>Discount Amount (-) <span> @if(!empty(Session::get('coupon_amount')))
									 INR {{Session::get('coupon_amount')}}.00 @else INR 00.00 @endif</span></li>
									<li >Shipping Cost (+) <span >INR 00.00</span></li>	
									<li style="color: #FE980F;">Grand Total <span>INR {{$grand_total = $total_amount - Session::get('coupon_amount')}}.00</span></li>
								  </ul>
							   </div>
							</div>
						  </table>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="post"> @csrf
			<div class="payment-options">
				<input type="hidden" name="grand-total" value="{{$grand_total}}">
				<input type="hidden" name="coupon_code" value="{{Session::get('couponCode')}}">
				<input type="hidden" name="coupon_amount" value="{{Session::get('coupon_amount')}}">
				<span>
					<label><strong>Select Payment Method :</strong></label>
				</span>
				<span>
					<label><input type="radio" name="payment-method" id="COD" value="COD"> COD</label>
				</span>
				<span>
					<label><input type="radio" name="payment-method" id="Paypal" value="Paypal"> Paypal</label>
				</span>
				<span>
					<button type="submit" class="btn btn-info pull-right" onclick="return selectPaymentMethod()">Place Order</button>
					{{--  <a href="{{url('/cart')}}"><button type="submit" class="btn btn-warning pull-right">Cancel</button></a> --}}
				</span>
			</div>
		</form>
	    </div>
   </section>
@endsection