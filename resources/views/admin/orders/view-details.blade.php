@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Widgets</a> </div>
    <h1>Order #{{$order_data->id}}</h1>
  </div>
  <div class="container-fluid">
    <hr>
 @if(session()->has("success"))
    <div class="alert alert-success">
        <h5 style="color: green">{{ session()->get("success")}}</h5>
    </div>
 @endif
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Ordered Deatails</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                 <tr>
                  <td class="taskDesc">Order id</td>
                  <td class="taskStatus"><span>{{$order_data->id}}</span></td>  
                </tr>
                <tr>
                  <td class="taskDesc">Order Date</td>
                  <td class="taskStatus"><span>{{$order_data->created_at}}</span></td>  
                </tr>
                <tr>
                  <td class="taskDesc"> Order Status</td>
                  <td class="taskStatus"><span>{{$order_data->order_status}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Total Amount</td>
                  <td class="taskStatus"><span>INR {{$order_data->grand_total}}</span></td>        
                </tr>
                <tr>
                  <td class="taskDesc"> Shipping Charges</td>
                  <td class="taskStatus"><span>INR {{$order_data->shipping_charges}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Coupon Code</td>
                  <td class="taskStatus"><span>{{$order_data->coupon_code}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Coupon Discount</td>
                  <td class="taskStatus"><span>INR {{$order_data->coupon_amount}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Payment Method</td>
                  <td class="taskStatus"><span>{{$order_data->payment_method}}</span></td>        
                </tr>
              </tbody>
            </table>
          </div>

        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Customer Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Customer id</td>
                  <td class="taskStatus"><span>{{$order_data->user_id}}</span></td>              
                </tr>
                <tr>
                  <td class="taskDesc">Customer Name</td>
                  <td class="taskStatus"><span>{{$order_data->name}}</span></td>                 
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Email</td>
                  <td class="taskStatus"><span>{{$order_data->user_email}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Address</td>
                  <td class="taskStatus"><span>{{$order_data->address}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer City</td>
                  <td class="taskStatus"><span>{{$order_data->city}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer State</td>
                  <td class="taskStatus"><span>{{$order_data->state}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Country</td>
                  <td class="taskStatus"><span>{{$order_data->country}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Pincode</td>
                  <td class="taskStatus"><span>{{$order_data->pincode}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Mobile</td>
                  <td class="taskStatus"><span>{{$order_data->mobile}}</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
       <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
        <h5>Update Order Status</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{url('admin/update-order-status')}}" method="post" >@csrf
              <input type="hidden" name="order_id" value="{{$order_data->id}}">
              <table width="100%">
                <tr>
                  <td>
                     <select name="order_status" id="order_status" class="control-label" required="">
                       <option value="" selected="">Select</option>
                       <option value="New" @if($order_data->order_status == "New") selected @endif>New</option>
                       <option value="Pending" @if($order_data->order_status == "Pending") selected @endif>Peding</option>
                       <option value="Cancelled" @if($order_data->order_status == "Cancelled") selected @endif>Cancelled</option>
                       <option value="In Process" @if($order_data->order_status == "In Process") selected @endif>In Process</option>
                       <option value="Shipped" @if($order_data->order_status == "Shipped") selected @endif>Shipped</option>
                      <option value="Delivered" @if($order_data->order_status == "Delivered") selected @endif>Delivered</option>
                     </select>
                   </td>
                  <td>
                  <input type="submit" name="" value="Update Status" class="btn btn-success pull-right">
                 </td>
               </tr>
            </form>
          </table>
          </div>
        </div> 
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Billing Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Customer id</td>
                  <td class="taskStatus"><span>{{$user_details->id}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc">Name</td>
                  <td class="taskStatus"><span>{{$user_details->name}}</span></td>
                </tr>
                  <td class="taskDesc"> Email</td>
                  <td class="taskStatus"><span>{{$user_details->email}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Address</td>
                  <td class="taskStatus"><span>{{$user_details->address}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> City</td>
                  <td class="taskStatus"><span>{{$user_details->city}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> State</td>
                  <td class="taskStatus"><span>{{$user_details->state}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Country</td>
                  <td class="taskStatus"><span>{{$user_details->country}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Pincode</td>
                  <td class="taskStatus"><span>{{$user_details->pincode}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Mobile</td>
                  <td class="taskStatus"><span>{{$user_details->mobile}}</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
        <h5>Shipping Details</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Customer id</td>
                  <td class="taskStatus"><span>{{$order_data->user_id}}</span></td>              
                </tr>
                <tr>
                  <td class="taskDesc">Name</td>
                  <td class="taskStatus"><span>{{$order_data->name}}</span></td>                 
                </tr>
                <tr>
                  <td class="taskDesc"> Email</td>
                  <td class="taskStatus"><span>{{$order_data->user_email}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Address</td>
                  <td class="taskStatus"><span>{{$order_data->address}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> City</td>
                  <td class="taskStatus"><span>{{$order_data->city}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> State</td>
                  <td class="taskStatus"><span>{{$order_data->state}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Country</td>
                  <td class="taskStatus"><span>{{$order_data->country}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Pincode</td>
                  <td class="taskStatus"><span>{{$order_data->pincode}}</span></td>
                </tr>
                <tr>
                  <td class="taskDesc"> Mobile</td>
                  <td class="taskStatus"><span>{{$order_data->mobile}}</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      
      </div>

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Product Details</h5>
      </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead  style="background:#FE980F; color:white;">
                <tr>
                  <th>Product Id</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Product size</th>
                  <th>Product color</th>                 
                  <th>product Price</th>
                  <th>Quantity</th>
               </tr>
             </thead>
              <tbody class="table-striped">
               @foreach($order_data->orders as $pro)
                <tr>
                  <td>{{$pro->product_id}} </td>
                  <td>{{$pro->product_code}} </td>
                  <td>{{$pro->product_name}} </td>
                  <td>{{$pro->product_size}} </td>
                  <td>{{$pro->product_color}} </td>
                  <td>{{$pro->product_price}} </td>
                  <td>{{$pro->product_qty}}</td>
                  
              </tr> 
              @endforeach      
       </table>
     </div>
</div>
@endsection
