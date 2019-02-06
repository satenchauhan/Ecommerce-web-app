@extends('layouts.adminLayout.index')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a><a href="#">Products</a><a href="#" class="current">Add Product Attributes</a>
    </div>
    <h1>Product Attributes</h1>
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
            <h5>Add Product Attribute</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{url('admin/add-attribute/'.$data->id)}}" name="add-attribute" enctype="multipart/form-data" id="add-attribute">@csrf   
              <input type="hidden" name="product_id" value="{{$data->id}}">    
            <div class="control-group">
              <label class="control-label">Product Name</label>
              <label class="control-label"><strong>{{$data->product_name}} </strong></label> 
            </div>
	          <div class="control-group">
	            <label class="control-label">Product Code</label>
	            <label class="control-label"><strong>{{$data->product_code}} </strong></label>
	          </div>
	          <div class="control-group">
	            <label class="control-label">Product Color</label>
	            <label class="control-label"><strong>{{$data->product_color}} </strong></label>
	          </div>
            <div class="control-group">
              <label class="control-label">Product Price</label>
              <label class="control-label"><strong>{{$data->price}} </strong></label>
            </div>
	          <div class="control-group">
	            <label class="control-label"></label>
	          <div class="field_wrapper">
				     <div>
			        <input type="text" name="sku[]" placeholder="SKU" id="sku" style="width: 150PX; height:30px;" required>
			        <input type="text" name="size[]" placeholder="Size" id="size" style="width: 150PX; height:30px;" required>
			        <input type="text" name="price[]" placeholder="Price" id="price" style="width: 150PX; height:30px;" required>
			        <input type="text" name="stock[]" placeholder="Stock" id="stock" style="width: 150PX; height:30px;" required>
			        <a href="javascript:void(0);" class="add_button text-success" title="Add field">&nbsp;
                <b><span style="font-size: 15px;">&#43;</span><span style="font-size: 12px;">Add</span></b>
              </a>
				     </div>
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
            <h5>Products Attribute List</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{url('admin/edit-attribute/'.$data->id)}}" method="post" name="edit-attribute" id="edit-attribute">@csrf
             <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="5%">Attribute Id</th>
                  <th width="5%">Product Id</th>
                  <th width="10%">SKU</th>
                  <th width="11%">Size</th>
                  <th width="8%">Price</th>
                  <th width="8%">Stock</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data['attributes'] as $attribute)
                <tr class="gradeX">
                  <td><input type="hidden" name="id-attr[]" value="{{$attribute->id}}">{{$attribute->id}}</td>
                  <td>{{$attribute->product_id}}</td>
                  {{-- <td>{{$attribute->sku}}</td> --}}
                  <td style="text-align: center;"><input type="text" name="sku[]" value="{{$attribute->sku}}" style="width: 100px;"></td>
                  {{-- <td>{{$attribute->size}}</td> --}}
                  <td style="text-align: center;"><input type="text" name="size[]" value="{{$attribute->size}}" style="width: 120px;"></td>
                  {{-- <td style="text-align: center;"><b>{{$attribute->price}}</b></td> --}}
                  <td><input type="text" name="price[]" value="{{$attribute->price}}" style="width: 70px;">&nbsp;&nbsp;<b>{{$attribute->price}}</b></td>
                  <td style="text-align: center;"><input type="text" name="stock[]" value="{{$attribute->stock}}" style="width: 70px;"></td>
                  <td style="text-align: center;">
                    <input type="submit" name="" value="Update" class="btn btn-primary" >
                    <a rel="{{$attribute->id}}" rel1="delete-attribute" href="javascript:" class="btn btn-danger center deleteRecord">Delete</a>
                  </td>
                 </tr>                
               @endforeach
              </tbody>
             </table>
            </form>
          </div>
        </div>
      </div>
     </div>
  </div>
 </div>
</div>
@endsection
 
