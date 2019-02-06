<!DOCTYPE html>
<html>
<head>
  <title>Saten E-Shop Store</title>
  <link href="{{asset('css/fcss/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
  <table>
      <tr><td>Hello {{$name}}</td></tr>
        <span>&nbsp;</span>
        <td><img src="{{asset('images/fimages/home/logo1.jpg')}}" width="100px;"><br></td>
        <p>&nbsp;</p>
        <p>Thank you for shopping with us. Your order details are given below</p>
        <p>Order No: {{$order_id}}</p>
       <table width="95%" cellpadding="5" cellspacing="5" class="table table-bordered " bgcolor="#e0d9d9">
           <tr bgcolor="#cccccc">
              <td width="10%">Product Name</td>
              <td width="8%">Product Code</td>
              <td width="10%">Size</td>
              <td width="8%">Color</td>
              <td width="8%">Quantity</td>
              <td width="6%">Price</td>
           </tr>
            @foreach($product_details->orders as  $product)
          <tr>
             <td>{{ $product->product_name }}</td>
             <td>{{ $product->product_code }}</td>
             <td>{{ $product->product_size }}</td>
             <td>{{ $product->product_color }}</td>
             <td>{{ $product->product_qty }}</td>
             <td>INR{{ $product->product_price }}</td>
         </tr>
         @endforeach
         <tr><td colspan="5" align="right">Shipping charges</td><td>INR {{$product_details->shipping_charges}}</td></tr>
         <tr><td colspan="5" align="right">Coupon Duscount</td><td>INR {{$product_details->coupon_amount}}</td></tr>
         <tr><td colspan="5" align="right">Grand Total</td><td>INR {{$product_details->grand_total}}</td></tr> 
       </table>
      </table><br>
      <div class="container-fluid">
        <div class="row">  
        <div class="col-sm-4 table-bordered">
          <div class=" form-group" >
            <h2 align="center">Billing Details</h2>
            <div class="form-group">
                 <label class="form-conctrol">Billing Name:</label> 
                {{$user_details->name}}      
            </div>
            <div class="form-group">
               <label class="form-conctrol"> <b>Address:</b></label> 
               {{$user_details->address}}
            </div>
            <div class="form-group">
              <label class="form-conctrol"> <b>City:</b></label> 
             {{$user_details->city}}
            </div>
            <div class="form-group">
               <label class="form-conctrol"> <b>State:</b></label> 
               {{$user_details->state}}
            </div>
            <div class="form-group">
                 <label class="form-conctrol"> <b>Country:</b></label> 
               {{$user_details->country}}
            </div>
            <div class="form-group">
              <label class="form-conctrol"> <b>Pincode:</b></label>  
               {{$user_details->pincode}}
            </div>
            <div class="form-group">
              <label class="form-conctrol"> <b>Mobile:</b></label> 
                {{$user_details->mobile}}
              </div>
          </div>
        </div>
        <div class="col-sm-4 table-bordered">
          <div class=form-group">
           <h2 align="center">Shipping Details</h2>
             <div class="form-group">
               <label class="form-conctrol">  <b>Name:</b></label> 
               {{$shipping_details->name}}
            </div>
            <div class="form-group">
               <label class="form-conctrol">  <b>Address:</b></label>  
               {{$shipping_details->address}}
            </div>
            <div class="form-group">
               <label class="form-conctrol">  <b>City:</b></label> 
               {{$shipping_details->city}}
            </div>
            <div class="form-group">
               <label class="form-conctrol">  <b>State:</b></label>  
               {{$shipping_details->state}}
            </div>
            <div class="form-group">
               <label class="form-conctrol">  <b>Country:</b></label>  
               {{$shipping_details->country}}
            </div>
            <div class="form-group">
               <label class="form-conctrol">  <b>Pincode:</b></label>  
               {{$shipping_details->pincode}}
            </div>
            <div class="form-group">
              <label class="form-conctrol">  <b>Mobile:</b></label>  
               {{$shipping_details->mobile}}
              </div>        
          </div><br>
        </div>        
      </div>
     </div>
<p>Thanks & Regards</p><
<p>Saten E-shop Online</p>
<p>Saten E-shop Team</p>
<p>For any queries: Please contact us on</p>
<p>info@sateneshop.com</p>
<p>Tolfree No: 180093838393</p>

</body>
</html>
  