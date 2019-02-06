<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Image;
use Auth;
use Session;
use App\Category;
use App\Product;
use App\User;
use App\Country;
use App\ProductsAttribute;
use App\ProductImages;
use App\Coupon;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;
use Validator;
use DB;



class ProductController extends Controller
{
		public function addProduct(Request $request){

			if ($request->isMethod('post')) {
				$data = $request->all();
				$this->validate($request,[
					'category_id'=>'required|',
					'subcategory_id'=>'required|',
					'product_name'=>'required|min:3|max:50|unique:products|',
					'product_code'=>'required|min:3|max:10',
					'product_color'=>'required',
					'description'=>'required',
					'care'=>'required',
					'price'=>'required',
					'image'=>'required',
				],[
					'category_id.required'=>'Please select category or subcategory !!',
					'product_name.required'=>'Please enter product  name !!',
					'product_code.required'=>'Please enter product  code !!',
					'product_color.required'=>'Please enter product color !!',
					'care.required'=>'Please write material and care details !!',
					'price.required'=>'Please enter product price !!',

				 ]);
					//===========================OR===========================================
				if (empty($request->input('category_id'))) {
					return redirect()->back()->with('error','The category or subcategory is missing !!');
				}
						
				$product = new Product();
				$product->category_id =  $data['category_id'];
				$product->subcategory_id =  $data['subcategory_id'];
				$product->product_name =  ucwords($data['product_name']);
				$product->product_code = ucwords($data['product_code']);
				$product->product_color =  ucwords($data['product_color']);

				//=If error constraints value null
				if(!empty($data['description'])){
					$product->description =  ucfirst($data['description']);
				}else{
					$product->description ='';
				}

				if(!empty($data['care'])){
						$product->care =  ucfirst($data['care']);
				}else{
						$product->care ='';
				}

					$product->price = $data['price'];

				if($request->hasFile('image')){

					$image_tmp = Input::file('image');

					if($image_tmp->isValid()){

						$extension = $image_tmp->getClientOriginalExtension();
						$filename = rand(111,99999).'.'.$extension;
						$large_image_path = 'images/bimages/products/large/'.$filename;
						$medium_image_path = 'images/bimages/products/medium/'.$filename;
						$small_image_path = 'images/bimages/products/small/'.$filename;
						//Resize Images
						Image::make($image_tmp)->save($large_image_path);
						Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
						Image::make($image_tmp)->resize(300,300)->save($small_image_path);
						//Store images name in products table
						$product->image =  $filename;
					}
				}

				if(empty($request->input('status'))){
						 $status = 0;
				}else{
						 $status = 1;
				} 
				if(empty($request->input('feature_item'))){
						 $feature = 0;
				}else{
						 $feature = 1;
				} 

				$product->status = $status;
				$product->feature_item = $feature;
				$product->save();
					
			 return redirect('/admin/show-products')->with('success','The product has been added successfuly !!');
			}
				//Categories drop down list
					$categories = Category::where(['parent_id'=>0])->get();
					 
				//Subcateategories drop down list with select
									$subcategories = "<option selected disabled>Select</option>";

					foreach($categories as $cat){
									$sub_categories =  Category::where(['parent_id'=>$cat->id])->get();

							foreach ($sub_categories as $sub_cat) {
									$subcategories .= "<option value='".$sub_cat->id."'>".$sub_cat->category."</option>";
							}
					}
					
		 return view('admin.products.add-product',compact('categories','subcategories'));
		}

		public function editProduct(Request $request, $id=null){
			if ($request->isMethod('post')) {
				$data = $request->all();

				if ($request->hasFile('image')){
						$image_tmp = Input::file('image');
					if ($image_tmp->isValid()) {  
						$extension = $image_tmp->getClientOriginalExtension();
						$filename = rand(111,99999).'.'.$extension;
						$large_image_path = 'images/bimages/products/large/'.$filename;
						$medium_image_path = 'images/bimages/products/medium/'.$filename;
						$small_image_path = 'images/bimages/products/small/'.$filename;
						//Resize Images
						Image::make($image_tmp)->save($large_image_path);
						Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
						Image::make($image_tmp)->resize(300,300)->save($small_image_path);
					}

				}else{

					$filename = $data['current_image'];
				}

				if (empty($request->input('status'))) {
				    $status = 0;
				}else{
				    $status = 1;
				} 

				if(empty($request->input('feature_item'))){
				    $feature = 0;
				}else{
					$feature = 1;
				}

				Product::where(['id'=>$id])->update([
					'category_id'   => $data['category_id'],
					'subcategory_id'=> $data['subcategory_id'],
					'product_name'  => ucwords($data['product_name']),
					'product_code'  => ucwords($data['product_code']),
					'product_color' => ucwords($data['product_color']),
					'description'   => ucfirst($data['description']),
					'care'   => ucfirst($data['care']),
					'price' => $data['price'],
					'image' => $filename,
					'status'=> $status,
					'feature_item'=> $feature
				]);

				return redirect('/admin/show-products')->with('success','The Product has been updated');
			}
				$edit_data = Product::find($id);
				//Categories name drop down list
				$categories = Category::where(['parent_id'=>0])->get();

				//Subcategories name drop down list
				$subcategories= "<option selected disabled>Select</option>";
				foreach($categories as $cat){
						$sub_categories =  Category::where(['parent_id'=>$cat->id])->get();
						foreach ($sub_categories as $sub_cat) {
							if ($sub_cat->id==$edit_data->subcategory_id) {
									$selected = "selected";
							}else{
									$selected = "";
							}
						$subcategories.= "<option value='".$sub_cat->id."' ".$selected.">".$sub_cat->category."</option>";
						}
				} 

				// end drop down
			return view('admin.products.edit-product',compact('edit_data','categories','subcategories'));
		
		}//End editProduct function

		public function showProducts(){

			$products = Product::all();  
			foreach ($products as $key => $value) {
				$category_name =  Category::where(['id'=>$value->category_id])->first();
				$products[$key]->category_name = $category_name->category;      
			}
			
			foreach ($products as $key => $value) {
				$subcategory_name =  Category::where(['id'=>$value->subcategory_id])->first();
				$products[$key]->subcategory_name = $subcategory_name->category;     
			}
			
			//echo "<pre>"; print_r($products); die;
			return view('admin.products.show-products',compact('products'));

		}

		public function deleteProduct($id){
				
				$product = Product::find($id)->where(['id'=>$id])->delete();
				return redirect('/admin/show-products')->with('success','The product has been deleted !!');
		
		}
		public function deleteProductImage($id){
				//get product image name
				$productImage = Product::where(['id'=>$id])->first();
				//echo $productImage->image; die;
				//Get Product Image path 
				$large_image_path = 'images/bimages/products/large/';
				$medium_image_path = 'images/bimages/products/medium/';
				$small_image_path = 'images/bimages/products/small/';

				// Delete Large Image if not exists in folder
				if (file_exists($large_image_path.$productImage->image)) {
						unlink($large_image_path.$productImage->image);
				}

				// Delete Medium Image if not exists in folder
				if (file_exists($medium_image_path.$productImage->image)) {
						unlink($medium_image_path.$productImage->image);
				}

				// Delete Small Image if not exists in folder
				if (file_exists($small_image_path.$productImage->image)) {
						unlink($small_image_path.$productImage->image);
				}

				//Deleting Image from products table, not from folder
				$product = Product::where(['id'=>$id])->update(['image'=>'']); //But it will not Delete from folder
				return redirect()->back()->with('success','The product image has been deleted !!');
		
		}

		//Delete Alternate Images
		public function deleteAltImage($id){

				$productAltImage = ProductImages::where(['id'=>$id])->first();
				$large_image_path  = 'images/bimages/products/large/';
				$medium_image_path = 'images/bimages/products/medium/';
				$small_image_path  = 'images/bimages/products/small/';

				if (file_exists($large_image_path.$productAltImage->image)){
						unlink($large_image_path.$productAltImage->image);
				}

				if (file_exists($medium_image_path.$productAltImage)) {
					 unlink($medium_image_path.$productAltImage->image);
				}
				if (file_exists($small_image_path.$productAltImage)) {
					 unlink($small_image_path.$productAltImage->image);
				}

				ProductImages::where(['id'=>$id])->delete();
				return redirect()->back()->with('success','The product altenate image(s) has been deleted !!');

		}

		//Product attributes
		public function addAttribute(Request $request, $id){
				$data = Product::find($id)->with('attributes')->where(['id'=>$id])->first();
				//$data = Product::find($id)->where(['id'=>$id])->first();
				//$data = json_decode(json_encode($data));
				//echo "<pre>"; print_r($data); die;
				if ($request->isMethod('post')) {

				$product = $request->all();
				//$product = Product::all();
				foreach ($product['sku'] as $p => $value) {
				 if (!empty($value)){
					 //Unique name of SKU, no duplicate
					 $attrCountSKU = ProductsAttribute::where('sku',$value)->count();
					 if ($attrCountSKU > 0) {
							 return redirect('admin/add-attribute/'.$id)->with('error','SKU already exists ! Please add another SKU');
					 }
					 // Unique size name check, no duplicate same saize name
					 $attrCountSize = ProductsAttribute::where(['product_id'=>$id,'size'=>$product['size'][$p]])->count();

					 if ($attrCountSize > 0) {
							 return redirect('admin/add-attribute/'.$id)->with('error',''.$product['size'][$p].' size already exists ! Please add another size');
					 }
					 $attribute = new ProductsAttribute(); 
					 $attribute->product_id = $id;
					 $attribute->sku =  ucwords($value);
					 $attribute->size =  ucfirst($product['size'][$p]);
					 $attribute->price =  $product['price'][$p];
					 $attribute->stock =  $product['stock'][$p];
					 $attribute->save();
				 }

				}
				return redirect('/admin/add-attribute/'.$id)->with('success','The product details or attributes has been added');
					
				}

				return view('admin.products.add-attribute',compact('data'));
		
		}

		public function editAttribute(Request $request, $id){
				if ($request->isMethod('post')) {
					 $data = $request->all();
					 //echo "<pre>"; print_r($edit_data); die;
				  foreach ($data['id-attr'] as $key => $attribute) {
					ProductsAttribute::where(['id'=>$data['id-attr'][$key]])->update([
					 'sku'=>$data['sku'][$key],
					 'size'=>$data['size'][$key], 
					 'price'=>$data['price'][$key], 
					 'stock'=>$data['stock'][$key]
					]);
				 }
				return redirect()->back()->with('success','The product attributes have been updated !!');
				}
		}

		public function addImages(Request $request, $id){
				$data = Product::with('attributes')->where(['id'=>$id])->first();

				if ($request->isMethod('post')) {
					//Add more or Multiple Product Images
					$image_data = $request->all();
					 $this->validate($request,[
						 'image'=>'required|unique:product_images|',
					 ],[

						 'image.required'=>'Please select image(s) to upload !!',
					 ]);
					//echo "<pre>"; print_r($data); die;
					if ($request->hasFile('image')) {
						$files = $request->file('image');
				//echo "<pre>"; print_r($file); die;
					  foreach ($files as $file) {
						//Upload Images after resize
						$image = new ProductImages;
						$extension =  $file->getClientOriginalExtension();
					    $filename = rand(111,99999).'.'.$extension;
						$large_image_path  ='images/bimages/products/large/'.$filename;
						$medium_image_path ='images/bimages/products/medium/'.$filename;
						$small_image_path  ='images/bimages/products/small/'.$filename;
						Image::make($file)->save($large_image_path);
						Image::make($file)->resize(600,600)->save($medium_image_path);
						Image::make($file)->resize(300,300)->save($small_image_path);
						$image->image = $filename;
						$image->product_id = $image_data['product_id'];
						$image->save();
					  }      
				    }

					return redirect('admin/add-images/'.$id)->with('success','The product image have been uploaded');          
				}

				$productImages = ProductImages::where(['product_id'=>$id])->get();
				//$productImages = json_decode(json_encode($productImages));
				 //echo "<pre>"; print_r($productImages); die;
				return view('admin.products.add-images',compact('data','productImages'));
		}

		public function deleteAttribute($id){

				$product_attribute = ProductsAttribute::find($id)->where(['id'=>$id])->delete();

				return redirect(/*'/admin/delete-attribute'*/)->back()->with('success','The product attribute has been deleted');
		
		}
	 
		public function products($url=null){
				
				//To show Error page 404
				$countCategory = Category::where(['url'=>$url,'status'=>1])->count();
				if ($countCategory==0) {
						abort(404);
				}
				
				$categories =  Category::with('categories')->where(['parent_id'=>0])->get();

				$category_data = Category::where(['url' => $url])->first();

				//To display category and subcategory with product details
				if ($category_data->parent_id==0) {

						$allproducts = Product::where(['category_id' =>$category_data->id])->where('status',1)->get();

				}else{

					 $allproducts = Product::where(['subcategory_id' =>$category_data->id])->where('status',1)->get(); 
				}

				return view('products.listing',compact('categories','category_data','allproducts'));
		
		}

		public function searchItems(Request $request){
			if($request->isMethod('post')){
				$data = $request->all();
				//echo "<pre>"; print_r($data); die;
			    $categories =  Category::with('categories')->where(['parent_id'=>0])->get();

			    $search_item = $data['search-item'];

			    $allproducts = Product::where('product_name','like','%'.$search_item.'%')->orwhere('product_code',$search_item)->where('status',1)->get();

			   return view('products.listing',compact('categories','allproducts','search_item'));

			}
		}

		public function productDetails($id){
				
				//Show 404 pag if product is disabled
				$productCount = Product::where(['id'=>$id,'status'=>1])->count();
				 if ($productCount == 0) {
					 abort(404);
				 }

				$productInfo =  Product::with('attributes')-> where(['id'=>$id])->first();
				
				// $productInfo = json_decode(json_encode($productInfo));
				// echo "<pre>"; print_r($productInfo); die;

				$relatedProducts = Product::where('id','!=', $id)->where(['category_id'=>$productInfo->category_id])->get();
				// $relatedProducts = json_decode(json_encode($relatedProducts));
				// echo "<pre>"; print_r($relatedProducts); die;
							// foreach ($relatedProducts->chunk(3) as $chunk) {
							//   foreach ($chunk as $item) {
							//       echo $item; echo "<br>";
							//   }
							//   echo "<br><br><br>";
							// }
							// die;
				//Get all categories and Sub Categories
				$categories =  Category::with('categories')->where(['parent_id'=>0])->get();
				//Get Product Alternate Image
				$productAltImage = ProductImages::where('product_id',$id)->get();
				// $productAltImage = json_decode(json_encode($productAltImage));
				// echo "<pre>"; print_r($productAltImage); die;

				$total_stock = ProductsAttribute::where('product_id', $id)->sum('stock'); 

				 
				return view('products.product-details',compact('productInfo','categories','productAltImage','total_stock','relatedProducts'));
		
		}

//Get product price  according to size
		// public function getProductPrice(Request $request){
		//     $data = $request->all();
		//     //echo "<pre>"; print_r($data); die;
		//     $productArr =  explode("-", $data['idSize']);
		//     //echo $productArr[0]; echo $productArr[1]; die;
		//     $productAttr = ProductsAttribute::where(['product_id'=>$productArr[0], 'size'=>$productArr[1]])->first();

		//     echo $productAttr->price;
		//     //echo $productAttr->stock;

		// }

//Get product stock  according to size
		public function getProductStock(Request $request){
				$data = $request->all();
				//echo "<pre>"; print_r($data); die;
				$productArr =  explode("-", $data['idSize']);
				//echo $productArr[0]; echo $productArr[1]; die;
				$productAttr = ProductsAttribute::where(['product_id'=>$productArr[0], 'size'=>$productArr[1]])->first();

				echo $productAttr->stock;

		}
//Add to Cart Products
		public function addtocart(Request $request){
			Session::forget('coupon_amount'); 
			Session::forget('couponCode');

			 $cart_data = $request->all();
			 $this->validate($request,[
				'size'=>'required|'
			],[

				'size.required'=>'Please select size of Item',
			]);
			//echo "<pre>"; print_r($cart_data); die;

			//check product stock is avaibale or not
			$product_size = explode("-", $cart_data['size']);
            // echo $product_size[0];
            // echo "<br>";
            // echo $product_size[1]; die;
			$product_stock = ProductsAttribute::where(['product_id'=>$cart_data['product_id'],'size'=>$product_size[1]])->first();
            //echo $product_stock->stock; die;

            if($product_stock->stock < $cart_data['quantity']){
            	
            	 return redirect()->back()->with('error','The required quantity is not available in stock !');
            }

			if(empty(Auth::user()->email)){
				$cart_data['user_email'] = '';
			}else{
				$cart_data['user_email'] = Auth::user()->email;
			}
			
			//Create session id
			$session_id = Session::get('session_id');
			if (!isset($session_id)) {
				 $session_id = str_random(40);
				 Session::put('session_id',$session_id);
			}  
			//To insert size with indexing number or id,
			$size_id = explode("-", $cart_data['size']);
			$product_size = $size_id[1];
			//echo "<pre>"; print_r($size_index_id); die;

			if(empty(Auth::check())){
				$countProducts = DB::table('cart')->where(['product_id'=>$cart_data['product_id'],'size'=>$product_size,'session_id'=>$session_id])->count();
                if($countProducts >0){
			        return redirect()->back()->with('error','The product or item is already exist in Cart');
			    }

			}else{
                $countProducts = DB::table('cart')->where(['product_id'=>$cart_data['product_id'],'size'=>$product_size,'user_email'=>$cart_data['user_email']])->count();
                if($countProducts >0){
			        return redirect()->back()->with('error','The product or item is already exist in Cart');
			    }

			}

			$productSKU = ProductsAttribute::select('sku')->where(['product_id'=>$cart_data['product_id'], 'size'=>$product_size])->first();
					DB::table('cart')->insert([
					'product_id'   => $cart_data['product_id'],
					'product_name' => $cart_data['product_name'],
					'product_code' => $productSKU->sku,
					'product_color'=> $cart_data['product_color'],
					'size'         => $product_size,
					'price'        => $cart_data['price'],
					'quantity'     => $cart_data['quantity'],
					'user_email'   => $cart_data['user_email'],
					'session_id'   => $session_id,
				]);

			return redirect('cart')->with('success','The item has been added in Shopping Cart !!');
		}

		public function cart(){

				$session_id = Session::get('session_id');
				if(Auth::check()) {
				   $user_email = Auth::user()->email;
				   $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();

				}else{
					$session_id = Session::get('session_id');
					$userCart = DB::table('cart')->where(['session_id'=> $session_id])->get();

				}
				$userCart =  DB::table('cart')->where(['session_id'=>$session_id])->get();
				foreach ($userCart as $key => $product) {
				//echo $product->product_id;
					$productInfo = Product::where('id',$product->product_id)->first();
					$userCart[$key]->image = $productInfo->image;
				}
				//echo "<pre>"; print_r($userCart); die;
				return view('products.cart',compact('userCart'));
		}

		public function deleteCartItem($id){
			
				Session::forget('coupon_amount'); 
				Session::forget('couponCode');

				DB::table('cart')->where('id',$id)->delete();
				return redirect('cart')->with('success','The Item has been deleted  from Cart !!');

		}
		
		public function addCartQuantity($id,$quantity){
			 
			 Session::forget('coupon_amount'); 
			 Session::forget('couponCode');

			 $cart_data = DB::table('cart')->where('id',$id)->first();

			 $product_attribute = ProductsAttribute::where('sku',$cart_data->product_code)->first();
			 //echo $product_attribute->stock; echo "--";
			 $add_quantity = $cart_data->quantity+$quantity;

			 if($product_attribute->stock >= $add_quantity) {

					DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
					return redirect('cart')->with('success','The Item quantity has been updated in Cart !!'); 

			 }else{

					return redirect('cart')->with('error','The required product quantity not available in stock !!'); 
			 }

		}

		public function applyCoupon(Request $request){
			 $data = $request->all();

				$couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();

				if($couponCount == 0){
					return redirect()->back()->with('error','The coupon code is not valid !!');

				}else{

					//perform other check active and inactive code
					 $coupon_data = Coupon::where('coupon_code',$data['coupon_code'])->first();
					 //if coupon is inactive
					 if( $coupon_data->status == 0){
							return redirect()->back()->with('error','The coupon code is not  active !!');
					 }
					 //If coupon is expired
					 $expiry_date = $coupon_data->expiry_date;
					 $current_date = date('Y-m-d');

					if($expiry_date < $current_date){
						return redirect()->back()->with('error','The coupon code is already expired !!');
					}

					 //Coupon is valid 
					 //Get cart total amount 
					$session_id = Session::get('session_id');
					//$userCart = DB::table('cart')->where(['session_id'=> $session_id])->get();
					if(Auth::check()) {
				    $user_email = Auth::user()->email;
				    $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();

					}else{
						$session_id = Session::get('session_id');
						$userCart = DB::table('cart')->where(['session_id'=> $session_id])->get();

					}
					$total_amount = 0;
					foreach ($userCart as $item) {
						$total_amount = $total_amount + ($item->price * $item->quantity);
					}

					 //Check if amount type is fixed or percentage
					if($coupon_data->amount_type =="Fixed"){
						$coupon_amount = $coupon_data->amount;

					}else{

						$coupon_amount = $total_amount * ($coupon_data->amount / 100);

					}
					 
					 // Add coupon code and Amount in Session
					 Session::put('coupon_amount', $coupon_amount); 
					 Session::put('couponCode',$data['coupon_code']);

					return redirect()->back()->with('success','The coupon code successfuly applied. You have got discount !!');
				}
		
		}


		public function checkout(Request $request){
			$user_id = Auth::user()->id;
			$user_email = Auth::user()->email;
			$user_data = User::find($user_id);
			$countries = Country::get();

		      //echo "<pre>"; print_r($shippingData); die;
					
		      //Check if Shipping Address exsits
				$shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
				$shippingData = array();
				if($shippingCount>0){
				   $shippingData = DeliveryAddress::where('user_id',$user_id)->first();
                }
		      
		      // Update Cart Table with user email
					$session_id = Session::get('session_id');
					DB::table('cart')->WHERE(['session_id'=>$session_id])->update(['user_email'=>$user_email]);

		        if($request->isMethod('post')){
					$data = $request->all();
					//echo "<pre>"; print_r($data); die;
					
					User::where('id',$user_id)->update([
						'name'    => $data['billing-name'],
						'address' => $data['billing-address'],
						'city'    => $data['billing-city'],
						'state'   => $data['billing-state'],
						'country' => $data['billing-country'],
						'pincode' => $data['billing-pincode'],
						'mobile'  => $data['billing-mobile']

					]);
					 
				if ($shippingCount>0) {
				 //If already exists Update Shipping Address
				 DeliveryAddress::where('user_id',$user_id)->update([
					'name'   => $data['shipping-name'],
					'address'=> $data['shipping-address'],
					'city'   => $data['shipping-city'],
					'state'  => $data['shipping-state'],
					'country'=> $data['shipping-country'],
					'pincode'=> $data['shipping-pincode'],
					'mobile' => $data['shipping-mobile']
				]);	 

				}else{
					// add new Shipping Address
					 $shipping = new DeliveryAddress;
					 $shipping->user_id = $user_id;
					 $shipping->user_email = $user_email;
					 $shipping->name  = $request['shipping-name'];
					 $shipping->address = $request['shipping-address'];
					 $shipping->city =    $request['shipping-city'];
					 $shipping->state  = $request['shipping-state'];
					 $shipping->country = $request['shipping-country'];
					 $shipping->pincode = $request['shipping-pincode'];
					 $shipping->mobile  = $request['shipping-mobile'];
					 $shipping->save();
				}
	          return redirect('/order-review');
			  }
				return view('products.checkout',compact('user_data','countries','shippingData'));
		}
   

		public function orderReview(){
			$user_id = Auth::user()->id;
			$user_email = Auth::user()->email;
			$user_data = User::where('id',$user_id)->first();
		    $shippingData = DeliveryAddress::where('user_id',$user_id)->first();
			//$shippingData = json_decode(json_encode($shippingData));
			//echo "<pre>"; print_r($shippingData); die;
			//dump($shippingData);

		  $user_cart = DB::table('cart')->where(['user_email'=>$user_email])->get();
		  foreach ($user_cart as $key => $product) {   	
		  	$product_data = Product::where('id',$product->product_id)->first();
		    $user_cart[$key]->image = $product_data->image;

		  }
      //echo "<pre>"; print_r($user_cart); die;
			return view('products.order-review', compact('user_data','shippingData','user_cart'));

		}

		public function placeOrder(Request $request){
			if ($request->isMethod('post')) {
				   $data = $request->all();
				   $user_id = Auth::user()->id;
				   $user_email = Auth::user()->email;

				   //Gwt Shipping Address of User
				   $shipping_details = DeliveryAddress::where(['user_email'=>$user_email])->first();
				   // $shipping_details = json_decode(json_encode($shipping_details));
				   // echo "<pre>"; print_r($shipping_details); die;

                   if(empty($data['shipping_charges'])){
                   	   $data['shipping_charges'] = "";
                   }

                   if(empty(Session::get('couponCode'))){
                   	   $data['coupon_code'] = '';

                   }else{
                   	   $coupon_code = Session::get('couponCode');
                   }

                   if(empty(Session::get('coupon_amount'))){
                   	   $data['coupon_amount'] = '';

                   }else{
                   	  $coupon_amount = Session::get('coupon_amount');
                   }

				   $order = new Order;
				   $order->user_id = $user_id;
				   $order->user_email = $user_email;
				   $order->name = $shipping_details->name;
				   $order->address = $shipping_details->address;
				   $order->city = $shipping_details->city;
				   $order->state = $shipping_details->state;
				   $order->country = $shipping_details->country;
				   $order->pincode = $shipping_details->pincode;
				   $order->mobile = $shipping_details->mobile;
				   $order->shipping_charges = $data['shipping_charges'];
				   $order->coupon_code = $data['coupon_code'];
				   $order->coupon_amount = $data['coupon_amount'];
				   $order->order_status = "New";
				   $order->payment_method = $data['payment-method'];
				   $order->grand_total = $data['grand-total'];
				   $order->save();


				   $order_id = DB::getPdo()->lastInsertId();

				   $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
				   foreach ($cartProducts as $pro) {
				   	  $cart_product = new OrdersProduct;
				   	  $cart_product->order_id = $order_id;
				   	  $cart_product->user_id = $user_id;
				   	  $cart_product->product_id = $pro->product_id;
				   	  $cart_product->product_code  =  $pro->product_code;
				   	  $cart_product->product_name  =  $pro->product_name;
				   	  $cart_product->product_size  =  $pro->size;
				   	  $cart_product->product_color =  $pro->product_color;
				   	  $cart_product->product_price =  $pro->price;
				   	  $cart_product->product_qty   =  $pro->quantity;
				      $cart_product->save();

				   }
				   
				   Session::put('order_id',$order_id);
				   Session::put('grand-total',$data['grand-total']);

				   if($data['payment-method'] =='COD'){
				   	//Fetch products details
				   	  $product_details = Order::with('orders')->where('id',$order_id)->first();
                      $product_details = json_decode(json_encode($product_details));
                      //echo "<pre>"; print_r($product_details); die;

                    //User details
                      $user_details = User::where('id',$user_id)->first();
                      $user_details = json_decode(json_encode($user_details));
                      //echo "<pre>"; print_r($user_details); die;

				   	  // Code for Order Email 
				   	  $email = $user_email;
				   	  $message_data = [
				   	   'email'=> $email,
				   	   'name' => $shipping_details->name,
				   	   'order_id'=>$order_id,
				   	   'product_details' => $product_details,
				   	   'user_details'=> $user_details,
				   	   'shipping_details'=> $shipping_details

				   	  ];
				   	 Mail::send('emails.order', $message_data, function($message) use($email){
				   	 	$message->to($email)->subject('Order Placed -Saten E-shop Store');
				   	 });
				   }

				   return redirect('/thanks');
			}

		}
		public function thanks(Request $request){
            $user_email = Auth::user()->email;
            DB::table('cart')->where('user_email',$user_email)->delete();

			return view('orders.thanks');
		}

		public function userViewOrders(){
		 	$user_id = Auth::user()->id;
		 	$orders =  Order::with('orders')->where('user_id',$user_id)->get();
		 	//$orders = json_decode(json_encode($orders));
		 	//echo "<pre>"; print_r($orders); die;
		 	return view('orders.user-view-orders',compact('orders'));
		}

		public function userOrderDetails($order_id){
			$user_id = Auth::user()->id;
			$order_details = Order::with('orders')->where('id',$order_id)->first();
			$order_details = json_decode(json_encode($order_details));
			//echo "<pre>"; print_r($order_details); die;
			return view('orders.user-order-details',compact('order_details'));
		}

		// public function paypal(Request $request){

			
		// 	return view('orders.paypal');
		// }

		// public function paypalThanks(){

		// 	return view('orders.paypal-thanks');
		// }
		public function showOrderList(){

		   //$order_datas = OrdersProduct::all();
			$orders = Order::with('orders')->get();
			//$orders = json_decode(json_encode($orders));
			//echo "<pre>"; print_r($orders); die;

			return view('admin.orders.view-orders',compact('orders'));
		}

		public function viewDetails($order_id){
           $order_data = Order::with('orders')->where('id',$order_id)->first();
           $order_data = json_decode(json_encode($order_data));
		   //echo "<pre>"; print_r($order_datas); die;
		   $user_id = $order_data->user_id;
		   $user_details = User::where('id',$user_id)->first();
		    $user_details = json_decode(json_encode( $user_details));
		   //echo "<pre>"; print_r( $user_details); die;
		  return view('admin.orders.view-details',compact('order_data','user_details'));
		}

		public function   updateStatus(Request $request){
            if($request->isMethod('post')){
            	$data =  $request->all();
            	//echo "<pre>"; print_r($data); die;
            	Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            	return redirect()->back()->with('success','Order status has been updated !!');
            }
		}

		public function orderInvoice($order_id){
           $order_data = Order::with('orders')->where('id',$order_id)->first();
           $order_data = json_decode(json_encode($order_data));
		   //echo "<pre>"; print_r($order_datas); die;
		   $user_id = $order_data->user_id;
		   $user_details = User::where('id',$user_id)->first();
		   $user_details = json_decode(json_encode( $user_details));
		   //echo "<pre>"; print_r( $user_details); die;
		  return view('admin.orders.order-invoice',compact('order_data','user_details'));
		}


}
