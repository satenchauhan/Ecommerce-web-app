@extends('layouts.adminLayout.index')
@section('content')
	<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="#">Products</a><a href="#" class="current">Products List</a></div>
    <h1>Products</h1>
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
            Products List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="7%">Product Id</th>
                  <th width="8%">Main Category </th>
                  <th width="6%">Subcategory</th>
                  <th width="8%">Product Name</th>
                  <th width="8%">Product Code</th>
                  <th width="8%">Product Color</th>
                  <th width="6%">Price</th>
                  <th width="5%">Image</th>
                   <th width="5%">Feature Item</th>
                  <th width="24%">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{$product->id}}</td>
                  <td>{{$product->category_name}}</td>
                  <td>{{$product->subcategory_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td style="text-align: center;">{{$product->product_code}}</td>
                  <td>{{$product->product_color}}</td>
                  <td style="text-align: center;">{{$product->price}}</td>
                  <td>@if(!empty($product->image))
                    <img src="{{asset('images/bimages/products/small/'.$product->image)}}">
                    @endif
                  </td>
                   <td style="text-align: center;">@if($product->feature_item == 1) Yes @else No @endif</td>
                  <td>
                    <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-primary btn-small" title="View Product Details">View</a>|

                    <a href="{{url('/admin/edit-product/'.$product->id )}}" class="btn btn-success btn-small" title="Edit Product">Edit</a>|

                    <a href="{{url('/admin/add-attribute/'.$product->id)}}"  class="btn btn-primary btn-small" title="Add Product Attributes">Add</a>|

                    <a href="{{url('/admin/add-images/'.$product->id)}}"  class="btn btn-info btn-small" title="Add More Images">Add</a>|
                    
                    <a rel="{{$product->id}}" rel1="delete-product" <?php /*href="{{url('/admin/delete-product/'.$product->id)}}" */ ?> href="javascript:" class="btn btn-danger btn-small deleteRecord" title="Delete Product" >Delete</a>
                  </td>
                 </tr>
                  <div id="myModal{{$product->id}}" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>{{$product->product_name}} Full Details</h3>
                    </div>
                  <div class="widget-content">
                    <div class="modal-body"> 
                    <p><b>Product Id :</b> {{$product->id}}</p>
                    <p><b>Category Id :</b> {{$product->category_id}}</p>
                    <p><b>Category Name :</b> {{$product->category_name}}</p>
                    <p><b>Product Code :</b> {{$product->product_code}}</p>
                    <p><b>Product Name :</b> {{$product->product_name}}</p>
                    <p><b>Product Color :</b> {{$product->product_color}}</p>
                    <p><b>Product Description :</b> {{$product->description}}</p>
                    <p><b>Product Price :</b> {{$product->price}}</p>
                    <p><b>Material :</b>Pur...........</p>
                    <p><b>Fabric :</b>................</p>
                    <p><b>Product Full Image :</b><br>
                     <img src="{{asset('images/bimages/products/small/'.$product->image)}}">
                     </p>
                   </div>    
                  </div>
                </div>
              </div>       
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
