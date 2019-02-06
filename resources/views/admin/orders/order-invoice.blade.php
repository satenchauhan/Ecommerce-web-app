<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{$order_data->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<b>Customer id:&nbsp;</b># {{$user_details->id}}<br>
						<b>Customer name:&nbsp;</b>{{$user_details->name}}<br>
						<b>E-amil:&nbsp;</b>{{$user_details->email}}<br>
						<b>Address:&nbsp;</b>{{$user_details->address}}<br>
						<b>City:&nbsp;</b>{{$user_details->city}}<br>
						<b>State:&nbsp;</b>{{$user_details->state}}<br>
						<b>Country:&nbsp;</b>{{$user_details->country}}<br>
						<b>Pincode:&nbsp;</b>{{$user_details->pincode}}<br>
						<b>Mobile:&nbsp;</b>{{$user_details->mobile}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address style="margin-left: -5px;">
        			<strong>Shipped To:</strong><br>
        			 
    					{{-- <b>Customer id:&nbsp;</b># {{$order_data->user_id}}<br> --}}
						<span><b>Reciever:&nbsp;</b>{{$order_data->name}}</span><br>
						<span><b>Address:&nbsp;</b>{{$order_data->address}}</span><br>
						<span><b>City:&nbsp;</b>{{$order_data->city}}</span><br>
						<span><b>State:&nbsp;</b>{{$order_data->state}}</span><br>
						<span><b>Country:&nbsp;</b>{{$order_data->country}}</span><br>
						<span><b>Pincode:&nbsp;</b>{{$order_data->pincode}}<br>
						<span><b>Mobile:&nbsp;</b>{{$order_data->mobile}}</span><br>
			
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					@if($order_data->payment_method=="COD")
    					   <strong>{{$order_data->payment_method}}</strong>: Cash on Delivery<br>
    					@else
    					   Paid by Debit or Credit Visa Card -> ending **** 4242<br>
    					@endif
    					<b>E-amil:&nbsp;</b>{{$order_data->user_email}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{$order_data->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    					<thead>
                                <tr>
        							<td><strong> Product Name (Code) </strong></td>
        							<td><strong>Size</strong></td>
        							<td class="text-center"><strong>Unit Price</strong></td>
        							<td class="text-left"><strong>Qty</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php $subtotal = 0; ?>
    							@foreach($order_data->orders as $pro)
    							<tr>
    								<td>{{$pro->product_name}}&nbsp;({{$pro->product_code}})</td>
    								<td>{{$pro->product_size}}</td>
    								<td class="text-center">{{$pro->product_price}}</td>
    								<td class="text-left">{{$pro->product_qty}}</td>
    								<td class="text-right">INR {{$pro->product_price * $pro->product_qty}}</td>
    							</tr>
    							<?php $subtotal = $subtotal + ($pro->product_price * $pro->product_qty); ?>
                                @endforeach
    							<tr>

    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">INR <b>{{$subtotal}}</b></td>
    							</tr>
    							<tr>

    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount(-)</strong></td>
    								<td class="no-line text-right">INR <sapn style='color:green;'>{{$order_data->coupon_amount}}</sapn></td>
    							</tr>
    							<tr>

    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping Charges(+)</strong></td>
    								<td class="no-line text-right">INR {{$order_data->shipping_charges}}</td>
    							</tr>
    							<tr>

    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Grand Total</strong></td>
    								<td class="no-line text-right"><sapn style='color:#ed9121;'>INR <b>{{$subtotal - $order_data->coupon_amount}}</b></sapn></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>