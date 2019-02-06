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
			</ul>	
			<div class="col-sm-4 col-sm-offset-4 table-bordered">
				<div class="login-form"><!--login form-->
					<h2 align="center">Reset Your Password</h2>
						<form id="restePassword" name="restePassword" action="{{url('/reset')}}" method="POST">@csrf
						    <input type="hidden" name="token" value="{{ $token }}">
							<input type="email" name="email" id="email" placeholder="Email Address" required="">
							<input type="password" name="password" id="password" placeholder="New Password" required>
							<input type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password"  required> 
							<button type="submit" class="btn btn-default">Reset Password</button><br>
					                                      
					</form>
				</div><br><!--/login form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection