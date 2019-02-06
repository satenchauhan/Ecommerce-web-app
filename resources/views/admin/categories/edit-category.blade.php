@extends('layouts.adminLayout.index')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Categories</a><a href="#" class="current">Edit Category </a></div>
    <h1>Categories</h1>
  </div>
  <div class="container-fluid"><hr>
 @if($errors->any())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <li><span>{{$error}}</span></li>
      @endforeach
      </div>
 @endif
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="/admin/edit-category/{{$data->id}}" name="edit-category" id="edit-category" novalidate="novalidate">@csrf
              <div class="control-group">
              <label class="control-label">Category Name</label>
               <div class="controls">
                <select class="form-control"  name="parent_id" id="parent_id" style="width:220px;">
                  <option value="0">Select</option>
                  @foreach($subcategories as $subcategory)
                  <option  value="{{ $subcategory->id}}" @if($subcategory->id == $data->parent_id) selected @endif>{{$subcategory->category}}</option>
                  @endforeach
                </select>
               </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Category/Subcategory</label>
                <div class="controls">
                  <input type="text" name="category" id="category" value="{{$data->category}} ">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{$data->url}} ">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($data->status=="1") checked @endif value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Category"  class="btn btn-primary"><a href="{{url('admin/show-categories')}}" class="btn btn-danger text-white pull-right" >Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection