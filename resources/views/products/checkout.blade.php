@extends('layouts.frontLayout.front-index')

@section('content')
<section id="form"><!--form-->
	<div class="container">
			<div class="row">
				 
			    @if($errors->any())
			    <ul class="alert alert-info">
				   @foreach($errors->all() as $error)
				      <li style="color: red;"><span>{{$error}}</span></li>
				   @endforeach	
				 </ul>
			    @endif
			    @if(session()->has("error"))
			       <div class="alert alert-info">					
				      <span style="color: red;">{{ session()->get("error")}}</span>
				   </div>				
				@endif
			    @if(session()->has("success"))
			       <div class="alert alert-success">					 
				      <span style="color: green;">{{ session()->get("success")}}</span>
				    </div>
				@endif
			   <form action="{{url('/checkout')}}" method="post">@csrf	
				<div class="col-sm-4 col-sm-offset-1 table-bordered">
					<div class="login-form form-group" >
					  <h2 align="center" style="margin-top: 10px;">Billing Address</h2>
						<h4 style="margin-top: -15px;">Bill To :</h4>
					    <div class="form-group">
						   <input type="text" name="billing-name" id="billing-name"  class="form-control" placeholder="Name" @if(!empty($user_data->name)) value="{{$user_data->name}}" @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="billing-address" id="billing-address" class="form-control" placeholder="Address" @if(!empty($user_data->address)) value="{{$user_data->address}}" @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="billing-city" id="billing-city"  class="form-control" placeholder="City" @if(!empty($user_data->city)) value="{{$user_data->city}}" @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="billing-state" id="billing-state" class="form-control"  placeholder="State" @if(!empty($user_data->state)) value="{{$user_data->state}}" @endif>
						</div>
						<div class="form-group">
						  <select name="billing-country" id="billing-country">
							<option value="">Select Country</option>
						   @foreach($countries as $country)
							<option value="{{$country->country_name}}"  @if(!empty($shippingData->country) && $country->country_name == $user_data->country) selected @endif >{{$country->country_name}}</option>
						   @endforeach
						</select>
						</div>
						<div class="form-group">
						   <input type="text" name="billing-pincode" id="billing-pincode" class="form-control" placeholder="Pincode" @if(!empty($user_data->pincode)) value="{{$user_data->pincode}}" @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="billing-mobile" id="billing-mobile" class="form-control" placeholder="Mobile" @if(!empty($user_data->mobile)) value="{{$user_data->mobile}}" @endif>
					    </div>
					    <!-- Material unchecked -->
						<div class="form-check">
						   <input type="checkbox" class="form-check-input" name="billtoship" class="" id="billtoship">
						   <label class="form-check-label" for="billtoship">Shipping Address as same Billing address</label>
						</div>
					</div><br>
				</div>
				<div class="col-sm-1">
					<h2 class="center">&nbsp;&nbsp;</h2>
				</div>
				<div class="col-sm-4 table-bordered">
					<div class="signup-form form-group"><!--sign up form-->
					<h2 align="center" style="margin-top: 10px;">Shipping Address</h2>
						<h4 style="margin-top: -15px;">Ship To:</h4>
						 <div class="form-group">
						   <input type="text" name="shipping-name" id="shipping-name"  class="form-control" placeholder="Name" @if(!empty($shippingData->name)) value="{{$shippingData->name}}" 
						   @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="shipping-address" id="shipping-address" class="form-control" placeholder="Address" @if(!empty($shippingData->address)) value="{{$shippingData->address}}"   
						   @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="shipping-city" id="shipping-city"  class="form-control" placeholder="City" @if(!empty($shippingData->city)) value="{{$shippingData->city}}" 
						   @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="shipping-state" id="shipping-state" class="form-control"  placeholder="State" @if(!empty($shippingData->state)) value="{{$shippingData->state}}"
						    @endif>
						</div>
						<div class="form-group">
						    <select name="shipping-country" id="shipping-country">
							<option value="">Select Country</option>
						   @foreach($countries as $country)
							<option value="{{$country->country_name}}" @if(!empty($shippingData->country) && $country->country_name == $shippingData->country) selected @endif >{{$country->country_name}}</option>
						   @endforeach
						</select>
						</div>
						<div class="form-group">
						   <input type="text" name="shipping-pincode" id="shipping-pincode" class="form-control" placeholder="Pincode" @if(!empty($shippingData->pincode)) value="{{$shippingData->pincode}}" 
						   @endif>
						</div>
						<div class="form-group">
						   <input type="text" name="shipping-mobile" id="shipping-mobile" class="form-control" placeholder="Mobile" @if(!empty($shippingData->mobile)) value="{{$shippingData->mobile}}" 
						   @endif>
					    </div>
					    <div class="form-group">
						   <button type="submit" class="btn btn-info">Checkout</button>
						   <a href="{{url('cart')}}"><button type="submit" class="btn btn-warning pull-right">Cancel</button></a>
					   </div>
					</div><br><!--/sign up form-->
				</div>				
			</div>
		</form>
	</div>
</section><!--/form-->
@endsection