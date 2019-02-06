@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Users</a><a href="#" class="current">Users List</a></div>
    <h1>View Users List</h1>
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
             Users List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="6%">Users Id</th>
                  <th width="9%">Users Name</th>
                  <th width="6%">Address</th>
                  <th width="7%">City</th>
                  <th width="5%">State</th>
                  <th width="6%">Country</th>
                  <th width="6%">Pincode</th>
                  <th width="5%">E-mail</th>
                  <th width="8%">Mobile</th>
                  <th width="6%">Status</th>
                  <th width="8%">Join on</th>  
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                <tr class="gradeX">
                  <td style="text-align: center;">{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td style="text-align: center;">{{$user->address}}</td>
                  <td style="text-align: center;">{{ucfirst($user->city)}}</td>
                  <td style="text-align: center;">{{$user->state}}</td>
                  <td style="text-align: center;">{{$user->country}}</td>
                  <td style="text-align: center;">{{$user->pincode}}</td>
                  <td style="text-align: center;">{{$user->email}}</td>
                  <td style="text-align: center;">{{$user->mobile}}</td>
                  <td style="text-align: center;">@if($user->status == 1) <span style='color:green;'>Active</span> @else <span style='color:tomato;'>Inactive</span> @endif</td>
                  <td style="text-align: center;">{{$user->created_at}}</td>
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
