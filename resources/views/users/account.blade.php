@extends('layouts.frontLayout.front-index')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
		    @if($errors->any())
			   @foreach($errors->all() as $error)
			    <div class="alert alert-info">
			       <span style="color: red;">{{$error}}</span>
			    </div>
			   @endforeach	
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
			<div class="col-sm-4 col-sm-offset-1 table-bordered">
				<div class="login-form">
				  <h2>Update Account</h2>
				    <form id="accountForm" name="accountForm" action="{{url('/account')}}" method="POST">@csrf
						<input type="text" name="name" id="name" value="{{$edit_user->name}}" placeholder="Name">
						<input type="text" name="address" id="address" value="{{$edit_user->address}}" placeholder="Address">
						<input type="text" name="city" id="city" value="{{$edit_user->city}}" placeholder="City">
						<input type="text" name="state" id="state" value="{{$edit_user->state}}" placeholder="State">
						<select name="country" id="country">
							<option value="">Select Country</option>
						@foreach($countries as $country)
							<option value="{{$country->country_name}}" @if($country->country_name === $edit_user->country) selected @endif >{{$country->country_name}}</option>
						@endforeach
						</select>
						<input type="text" name="pincode" id="pincode" value="{{$edit_user->pincode}}" placeholder="Pincode" style="margin-top:10px;">
						<input type="text" name="mobile" id="mobile" value="{{$edit_user->mobile}}" placeholder="Mobile">
						<br>
						<button type="submit" class="btn btn-default">Update</button>
					</form>	 
				</div><br>
			</div>
			<div class="col-sm-1">
				<h2 class="center">&nbsp;&nbsp;</h2>
			</div>
			<div class="col-sm-4 table-bordered">
				<div class="signup-form">
				  <h2>Update Password</h2>
				  <form id="passwordForm" name="passwordForm" action="{{url('/update-user-pass')}}" method="POST">@csrf
				  	<input type="password" name="current_pass" id="current_pass"  placeholder="Old Password">
				  	 <span id="checkPass"></span>
				  	<input type="password" name="new_pass" id="new_pass" placeholder="New Password">
				  	<input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confim Password">
				  	<button type="submit" class="btn btn-default">Update</button>
				  </form>		
				</div><br>
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection