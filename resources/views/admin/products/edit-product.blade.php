@extends('layouts.adminLayout.index')
@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Products</a><a href="#" class="current">Edit Products</a>
    </div>
    <h1>Products</h1>
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
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/edit-product/'.$edit_data->id)}}" name="add-category" enctype="multipart/form-data" id="add-category" novalidate="novalidate">@csrf
            <div class="control-group">
              <label class="control-label">Select Category</label>
               <div class="controls">
                <select class="form-control"  name="category_id" id="category_id" style="width:220px;">
                  <option value="selected disabled">Select</option>
                  @foreach($categories as $cat)
                  <option value="{{$cat->id}}" @if($cat->id==$edit_data->category_id) selected @endif>{{$cat->category}}</option>
                  @endforeach
                </select>
               </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Subcategory</label>
               <div class="controls">
                <select class="form-control"  name="subcategory_id" id="subcategory_id" style="width:220px;">
                  <?= $subcategories; ?>
                </select>
               </div>
            </div>           
            <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value=" {{$edit_data->product_name}}">
                </div>
            </div>
	          <div class="control-group">
	            <label class="control-label">Product Code</label>
	            <div class="controls">
	              <input type="text" name="product_code" id="product_code" value=" {{$edit_data->product_code}}">
	            </div>
	          </div>
	          <div class="control-group">
	            <label class="control-label">Product Color</label>
	            <div class="controls">
	              <input type="text" name="product_color" id="product_color" value=" {{$edit_data->product_color}}">
	            </div>
	          </div>
             <div class="control-group">
              <label class="control-label">Description</label>
               <div class="controls">
                <textarea name="description" id="description">{{$edit_data->description}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Material & Care</label>
               <div class="controls">
                <textarea name="care" id="care">{{$edit_data->care}}</textarea>
              </div>
            </div>
            <div class="control-group">
	            <label class="control-label">Price</label>
	            <div class="controls">
	              <input type="text" name="price" id="price" value=" {{$edit_data->price}}">
	            </div>
	          </div>
	          <div class="control-group">
	            <label class="control-label">Product Image</label>
	            <div class="controls">
	              <input type="file" name="image" id="image" {{-- value="{{$edit_data->image}}" --}} >|
                <a href="{{('/admin/delete-product-image/'.$edit_data->id)}} "> <b>Delete Image </b></a>
                 @if(!empty($edit_data->image))
                 <input type="hidden" name="current_image" value="{{$edit_data->image}}">|
                <a href="{{asset('images/bimages/products/large/'.$edit_data->image)}}" ><img src="{{asset('images/bimages/products/small/'.$edit_data->image)}}" style="width: 40px; margin-left:20px;"></a>Click on image for large view
                @endif  
              </div>  
	          </div>
            <div class="control-group">
              <label class="control-label">Feature item</label>
              <div class="controls">
                <input type="checkbox" name="feature_item" id="feature_item" @if($edit_data->feature_item=="1") checked @endif value="1">
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enable</label>
              <div class="controls">
                <input type="checkbox" name="status" id="status" @if($edit_data->status=="1") checked @endif value="1">
            </div>
            </div>
            <div class="form-actions">
              <input type="submit" value="Edit Product" class="btn btn-primary">
              <a href="{{url('admin/show-products')}}" class="btn btn-danger text-white pull-right" >Cancel</a>
            </div>
           </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection