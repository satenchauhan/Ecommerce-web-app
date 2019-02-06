@extends('layouts.adminLayout.index')
@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Coupons</a><a href="#" class="current">Add Coupon</a>
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
            <h5>Add Coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/add-coupon')}}" name="add-coupon" id="add-coupon">@csrf
            <div class="control-group">
              <label class="control-label">Amount Type</label>
               <div class="controls">
                <select class="form-control" name="amount_type" id="amount_type" style="width:220px;">
                   <option value="0">Select</option>
                  <option value="Percentage">Percentage</option>
                  <option value="Fixed">Fixed</option>
                </select>
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Coupon Code</label>
              <div class="controls">
                <input type="text" name="coupon_code" id="coupon_code">
              </div>
            </div>
	          <div class="control-group">
	            <label class="control-label">Amount</label>
	            <div class="controls">
	              <input type="text" name="amount" id="amount">
                {{-- <input type="number" name="amount" id="amount" min="1" max="80" required> --}}
	            </div>
	          </div> 
	          <div class="control-group">
	            <label class="control-label">Expiry Date</label>
	            <div class="controls">
	              <input type="text" name="expiry_date" id="expiry_date" autocomplete="off">
                {{-- <input type="date" name="expiry_date" id="expiry_date" autocomplete="off" required> --}}
	            </div>
	          </div>        
	          <div class="control-group">
	            <label class="control-label">Enable</label>
	             <div class="controls">
	               <input type="checkbox" name="status" id="status" value="1">
	             </div>
	          </div>
              <div class="form-actions">
               <input type="submit" value="Add Coupon" class="btn btn-primary">
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