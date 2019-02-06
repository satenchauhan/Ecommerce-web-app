@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Categories</a><a href="#" class="current">Categories List</a></div>
    <h1>Categories</h1>
  </div>
  <div class="container-fluid"><hr>
 {{-- @if(session()->has("error"))
    <div class="alert alert-danger">
        <h4 style="color: red">{{ session()->get("error")}}</h4>
    </div>
 @endif --}}
 @if(session()->has("success"))
    <div class="alert alert-success">
      <h4 style="color: green">{{ session()->get("success")}}</h4>
    </div>
 @endif
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Categories List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="10%">Id #</th>
                  <th width="15%">Category/Subcategory</th>
                  <th width="8%">Category Id</th>
                  <th width="15%">Category URL</th>
                  <th width="6%">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{$category->id}}</td>                 
                  <td>{{$category->category}}</td> 
                  <td>{{$category->parent_id}}</td>  
                  <td class="center">{{$category->url}}</td>
                  <td >
                    <a href="{{url('/admin/edit-category/'.$category->id )}}" class="btn btn-success btn-medium pull-left">Edit</a>
                    <a rel="{{$category->id}}" rel1="delete-category" <?php /*href="{{url('/admin/delete-category/'.$category->id)}}" */?> class="btn btn-danger btn-medium pull-right deleteRecord">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {{-- <div class="pull-right">{{$categories->links()}} </div> --}}
          </div>
        </div> 
      </div>
    </div>
  </div>  
</div>
 
@endsection
