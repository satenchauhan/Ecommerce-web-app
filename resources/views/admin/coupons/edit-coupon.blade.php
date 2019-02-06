@extends('layouts.adminLayout.index')
@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Coupons</a><a href="#" class="current">Edit Coupon</a>
    </div>
    <h1>Coupons</h1>
  </div>
  <div class="container-fluid"><hr>
@if($errors->any())
    <div class="alert alert-danger" style="color: red;">
      @foreach($errors->all() as $error)
      <li><span>{{$error}}</span></li>
      @endforeach
    </div>
 @endif
 @if(session()->has("error"))
    <div class="alert alert-danger" style="color: red;">
        <h5>{{ session()->get("error")}}</h5>
    </div>
 @endif
 @if(session()->has("success"))
    <div class="alert alert-success">
        <h5 style="color: green">{{ session()->get("success")}}</h5>
    </div>
 @endif
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/edit-coupon/'.$edit_data->id)}}" name="edit-coupon" enctype="multipart/form-data" id="edit-coupon" novalidate="novalidate">@csrf 
            <div class="control-group">
              <label class="control-label">Amount Type</label>
               <div class="controls">
                <select class="form-control" name="amount_type" id="amount_type" style="width:220px;">
                  <option  @if($edit_data->amount_type=="Percentage") selected @endif >Percentage</option>
                  <option  @if($edit_data->amount_type=="Fixed") selected @endif>Fixed</option>
                </select>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label">Coupon Code</label>
              <div class="controls">
                <input type="text" name="coupon_code" id="coupon_code" value="{{$edit_data->coupon_code}}">
              </div>
            </div>
	          <div class="control-group">
	            <label class="control-label">Amount</label>
	            <div class="controls">
	              <input type="text" name="amount" id="amount" value="{{$edit_data->amount}}">
	            </div>
	          </div>    
	          <div class="control-group">
	            <label class="control-label">Expiry Date</label>
	            <div class="controls">
	              <input type="text" name="expiry_date" id="expiry_date" value="{{$edit_data->expiry_date}}" autocomplete="off">
	            </div>
	          </div>        
	          <div class="control-group">
	            <label class="control-label">Enable</label>
	             <div class="controls">
	               <input type="checkbox" name="status" id="status" @if($edit_data->status=="1")checked @endif value="1">
	             </div>
	          </div>
            <div class="form-actions">
               <input type="submit" value="Edit Coupon" class="btn btn-primary">
               <a href="{{url('admin/show-coupons')}}" class="btn btn-danger text-white pull-right" >Cancel</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection