@extends('layouts.adminLayout.index')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Banner</a><a href="#" class="current">Edit Banner</a>
    </div>
    <h1>Banners</h1>
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
            <h5>Edit Banner</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/edit-banner/'.$edit_banner->id)}}" name="add-category" enctype="multipart/form-data" id="add-category">@csrf 
              <div class="control-group">
	             <label class="control-label">Banner Image</label>
	             <div class="controls">
	              <input type="file" name="image" id="image"  value="{{$edit_banner->image}} ">
                @if(!empty($banner->image))
                <input type="hidden" name="current_image" value="{{$edit_banner->image}}">
                 @endif
	            </div>
	          </div>   
	          <div class="control-group">
	            <label class="control-label">Title</label>
	            <div class="controls">
	              <input type="text" name="title" id="title" value="{{$edit_banner->title}} ">
	            </div>
	          </div>
	          <div class="control-group">
	            <label class="control-label">Link</label>
	            <div class="controls">
	              <input type="text" name="link" id="link" value="{{$edit_banner->link}} ">
	            </div>
	          </div>     	         
              <div class="control-group">
               <label class="control-label">Enable / Disable</label>
                <div class="controls">
                 <input type="checkbox" name="status" id="status" @if($edit_banner->status=="1") checked @endif value="1">
                </div>
              </div>
              <div class="form-actions">
               <input type="submit" value="Edit Banner" class="btn btn-primary">
               <a href="{{url('admin/show-banners')}}" class="btn btn-danger text-white pull-right" >Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection