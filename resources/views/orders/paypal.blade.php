@extends('layouts.frontLayout.front-index')
@section('content')
	<section id="cart_items" >
		<div class="container" align="center">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				<li class="active"><h2>Thank you for shopping on E-Shop<h2></li>  
				</ol>
			</div>
			<div class="table-responsive cart_info">
				
			</div>
		</div>
	</section>
	<section id="do_action">
		<div class="container">
			<div class="heading" align="center" >
				<h3>Your order has been placed and will shipped within 2 working days</h3>
				<p>You Order Number : <strong>{{Session::get('order_id')}}</strong> </p>
				<p>Total Amount Payabel : INR <strong>{{Session::get('grand-total')}}</strong></p>
				<p>Please make payment by clicking on payament Option listed below</p>
				{{-- Below need to create form for payapl from paypal.com --}}
			</div>
			
		</div>
	</section>
	

@endsection

<?php 
      Session::forget('order_id');
      Session::forget('grand-total');

 ?>