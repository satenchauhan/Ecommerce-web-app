@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Categoriess</a><a href="#" class="current">Add Categories</a>
    </div>
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
            <h5>Add Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/add-category')}}" name="add-category" id="add-category" novalidate="novalidate">@csrf
             <div class="control-group">
              <label class="control-label">Add<b>/</b>Select Category</label>
               <div class="controls">
                <select class="form-control"  name="parent_id" id="parent_id" style="width:220px;">
                  <option value="0">Category</option>
                  @foreach($categories as $category)
                  <option  value="{{ $category->id}}">{{$category->category}}</option>
                  @endforeach
                </select>
               </div>
              </div>         
              <div class="control-group">
                <label class="control-label">Category<b>/</b>Subcategory</label>
                <div class="controls">
                  <input type="text" name="category" id="category">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Category"  class="btn btn-primary">
                <a href="{{url('admin/show-categories')}}" class="btn btn-danger text-white pull-right" >Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection