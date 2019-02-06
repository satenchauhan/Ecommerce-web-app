@extends('layouts.adminLayout.index')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Banners</a><a href="#" class="current">Banners List</a></div>
    <h1>Banners</h1>
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
            Banners List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="7%">Banner Id</th>
                  <th width="8%">Title </th>
                  <th width="10%">Links</th>           
                  <th width="15%">Image</th>
                  <th width="8%">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($banners as $banner)
                <tr class="gradeX">
                  <td>{{$banner->id}}</td>
                  <td>{{$banner->title}}</td>
                  <td>{{$banner->link}}</td>
                  <td>
                  	@if(!empty($banner->image))
                    <img src="{{asset('/images/fimages/banners/'.$banner->image)}}" style="width: 80px;">
                    @endif
                  </td>
                  <td>
                  	<a href="{{url('/admin/edit-banner/'.$banner->id )}}" class="btn btn-success " title="Edit Banner">Edit</a>|
                    
                    <a rel="{{$banner->id}}" rel1="delete-banner" href="javascript:" class="btn btn-danger deleteRecord" title="Delete Banner" >Delete</a> 
                  </td>
                 </tr>
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
