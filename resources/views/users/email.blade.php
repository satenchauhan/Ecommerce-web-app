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
			<div class="col-sm-4 col-sm-offset-1 table-bordered">
				<div class="login-form"><!--login form-->
					<h2 align="center">Forgot Your Password</h2>
					  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                      @endif
						<form id="forgot-password" name="forgot-password" action="{{ url('/email')}}" method="POST">@csrf
						<input type="email" name="email" id="email" placeholder="Email Address" required="">
			
						<button type="submit" class="btn btn-default">Send Reset Password  Link</button><br>
					                                          
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
						<input type="text" name="name" id="name" placeholder="Name"/>
						<input type="email" name="email" id="email" placeholder="Email Address"/>
						<input type="password" name="password" id="password" placeholder="Password"/><br>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><br><br><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
@endsection