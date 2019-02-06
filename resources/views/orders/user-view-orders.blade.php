@extends('layouts.frontLayout.front-index')
@section('content')
	<section id="cart_items" >
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				 <li><a href="#">Home</a></li>
				  <li class="active">Orders</li>
				</ol>
			</div>
		</div>
	</section>
	<section id="do_action">
		<div class="container" style="margin-top: -35px">
			<div class="heading" align="center" >
				<table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead  style="background:#FE980F; color:white;">
                <tr>
                  <th>Order Id</th>
                  <th>Ordered Product</th>
                  <th>Pyament Method</th>
                  <th>Grand Total</th>
                  <th>Purchased on</th>
               </tr>
             </thead>
              <tbody class="table-striped">
               @foreach($orders as $order)
                <tr>
                  <td>{{$order->id}} </td>
                  <td><a href="{{url('/orders/'.$order->id)}}"> @foreach($order->orders as $pro) {{$pro->product_code}}<br> @endforeach </a></td>
                  <td align="center">{{$order->payment_method}} </td>
                  <td align="center">{{$order->grand_total}} </td>
                  <td>{{$order->created_at}} </td>
              </tr> 
              @endforeach      
       </table>
	   </div>			
	</div>
</section>
@endsection