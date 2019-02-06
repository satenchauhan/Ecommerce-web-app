

@extends('layouts.frontLayout.front-index')
@section('content')
  <section id="cart_items" >
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
         <li><a href="#">Home</a></li>
          <li><a href="{{url('orders')}}">Orders</a></li>
          <li class="active">{{$order_details->id}}</li>
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
               @foreach($order_details->orders as $pro)
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
</section>
@endsection