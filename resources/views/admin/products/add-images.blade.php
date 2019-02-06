@extends('layouts.adminLayout.index')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Products</a><a href="#" class="current">Add Product Attributes</a>
    </div>
    <h1>Product Alternate images</h1>
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
            <h5>Add Product Images</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/add-images/'.$data->id)}}" name="add-attribute" enctype="multipart/form-data" id="add-attribute">@csrf   
              <input type="hidden" name="product_id" value="{{$data->id}}">    
            <div class="control-group">
              <label class="control-label">Product Name</label>
              <label class="control-label">&nbsp;<strong>{{$data->product_name}} </strong></label> 
            </div>
	          <div class="control-group">
	            <label class="control-label">Product Code</label>
	            <label class="control-label"><strong>{{$data->product_code}} </strong></label>
	          </div>
            <div class="control-group">
              <label class="control-label">Alternate Product Image(s)</label>
             <div class="controls">
              <input type="file" name="image[]" id="image" multiple="multiple">
             </div>
            </div>
            <div class="form-actions">
              <input type="submit" value="Add Attribute" class="btn btn-primary">
              <a href="{{url('admin/show-products')}}" class="btn btn-danger text-white pull-right" >Cancel</a>
            </div>
          </form>
         </div>
        </div>
      </div>
     </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>View Product Images</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="7%">Images Id</th>
                  <th width="7%">Product Id</th>
                  <th width="10%">Images</th>
                  <th width="2%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productImages as $image)
                <tr>
                 <td>{{$image->id}}</td>
                 <td>{{$image->product_id}}</td>
                 <td>
                   @if(!empty($image->image))
                    <img src="{{asset('images/bimages/products/small/'.$image->image)}}" width="50px;">
                   @endif
                 </td>
                 <td align="center">
                   <a rel="{{$image->id}}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger deleteRecord" title="Delete Alternate Image" >Delete Image</a>
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
</div>
@endsection
 
