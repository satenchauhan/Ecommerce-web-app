@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Coupons</a><a href="#" class="current">Coupons List</a></div>
    <h1>Coupons</h1>
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
            Coupons List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="7%">Coupon Id</th>
                  <th width="8%">Coupon Code</th>
                  <th width="10%">Amount</th>
                  <th width="10%">Amount Type</th>
                  <th width="8%">Expiry Date</th>
                  <th width="8%">Status</th>
                  <th width="14%">Create Date</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td style="text-align: center;">{{$coupon->id}}</td>
                  <td style="text-align: center;">{{$coupon->coupon_code}}</td>
                  <td style="text-align: center;">
                    {{$coupon->amount}}
                    @if($coupon->amount_type=="Percentage") % @else INR @endif
                  </td>
                  <td style="text-align: center;">{{$coupon->amount_type}}</td>
                  <td style="text-align: center;">{{$coupon->expiry_date}}</td>
                  <td style="text-align: center;">
                     @if($coupon->status=="1") Active @else Inactive @endif
                  </td>
                  <td style="text-align: center;">{{$coupon->created_at}}</td>
                  <td style="text-align: center;">
                    <a href="{{url('/admin/edit-coupon/'.$coupon->id)}}" class="btn btn-success btn-small" title="Edit Coupon">Edit</a> |
                  {{-- delete by uisng laravel method --}}
                    {{-- <a id="delete-coupon" href="{{url('admin/delete-coupon/'.$coupon->id)}}" name="delete-coupon" class="btn btn-danger btn-small" title="Delete Coupon">Delete</a> --}}

                  {{-- delete by uisng javascript function confirm method --}}

                    {{-- <a id="delete-coupon" onclick="return delCoupon();" href="{{url('admin/delete-coupon/'.$coupon->id)}}" name="delete-coupon" class="btn btn-danger btn-small" title="Delete Coupon">Delete</a> --}}

                  {{-- delete by uisng sweet alert method --}}
                    <a rel="{{$coupon->id}}" rel1="delete-coupon" href="javascript:" class="btn btn-danger btn-small deleteRecord" title="Delete Coupon">Delete</a>
                  </td>
                 </tr>
                 @endforeach
                </div>       
              </tbody>
            </table>
          </div>
        </div> 
      </div>
    </div>
  </div>  
</div>
@endsection
