@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Orders</a><a href="#" class="current">Orders List</a></div>
    <h1>View Orders List</h1>
  </div>
  <div class="container-fluid"><hr>
 @if(session()->has("error"))
    <div class="alert alert-danger">
        <h4 style="color: red">{{ session()->get("error")}}</h4>
    </div>
 @endif
 @if(session()->has("success"))
    <div class="alert alert-success">
        <h4 style="color: green">{{ session()->get("success")}}</h4>
    </div>
 @endif
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>
            Products List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="6%">Order Id</th>
                  <th width="10%">Order Date</th>
                  <th width="9%">Customer Name</th>
                  <th width="6%">Email</th>
                  <th width="8%">Items</th>
                  <th width="5%">Status</th>
                  <th width="9%">Pyament Method</th>
                  <th width="5%">Amount</th>
                  <th width="8%">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr class="gradeX">
                  <td style="text-align: center;">{{$order->id}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->user_email}}</td>
                  <td>@foreach($order->orders as $pro) {{$pro->product_code}}&nbsp;&nbsp;({{$pro->product_qty}})<br> @endforeach</td>

                  <td style="text-align: center;">{{$order->order_status}}</td>
                  <td style="text-align: center;">{{$order->payment_method}}</td>
                  <td style="text-align: center;">{{$order->grand_total}}</td>
                  <td>
                    <a target="_blank" href="{{url('admin/view-details/'.$order->id)}}" class="btn btn-primary btn-small" title="View Product Details">View Details</a><hr>
                    <a target="_blank" href="{{url('admin/order-invoice/'.$order->id)}}" class="btn btn-info btn-small" title="View Invoice">View Invoice</a>
                  </td>
                 </tr>
                </div>
               </div>       
              @endforeach
              </tbody>
             </table>
          </div>
        </div> 
      </div>
    </div>
  </div>  
</div>
@endsection
