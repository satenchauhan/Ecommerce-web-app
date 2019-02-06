@extends('layouts.frontLayout.front-index')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			@if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }} <span>Please login again</span>
              </div>
            @endif
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
			<div class="col-sm-4 col-sm-offset-1 table-bordered">
				<div class="login-form"><!--login form-->
					<h2 align="center">Login to your account</h2>
						<form id="login-form" name="login-form" action="{{url('/user-login')}}" method="POST">@csrf
						<input type="email" name="email" id="email" placeholder="Email Address" required="">
						<input type="password" name="password" id="password" placeholder="Password">

					    <span><input type="checkbox" class="checkbox"> Keep me signed in</span> 
						<button type="submit" class="btn btn-default">Login</button><br>
					                          
                        <a href="{{ url('/reset-form') }}">Forgot Your Password ?</a>                         
					</form>
				</div><br><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="center">&nbsp;&nbsp;</h2>
			</div>
			<div class="col-sm-4 table-bordered">
				<div class="signup-form"><!--sign up form-->
					<h2 align="center">New User Signup!</h2>
					<form id="registerForm" name="registerForm" action="{{url('/user-register')}}" method="POST">@csrf
						<input type="text" name="name" id="name" placeholder="Name" required="">
						<input type="email" name="email" id="email" placeholder="Email Address" required="">
						<input type="password" name="password" id="password" placeholder="Password" required=""><br>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><br><br><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection