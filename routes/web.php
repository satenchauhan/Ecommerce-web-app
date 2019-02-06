<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('coming-soon');
// });


Route::match(['get','post'], '/admin', 'AdminController@login');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

//Index  Page
Route::get('/', 'IndexController@index');

//Category/Listing Page
Route::get('/products/{url}','ProductController@products');

//Product details page
Route::get('product/{id}','ProductController@productDetails');

//Get Product Attribute Price
//Route::get('/get-product-price','ProductController@getProductPrice');

//Get Product Attribute Price
Route::get('/get-product-stock','ProductController@getProductStock');

//Add to Cart Route
Route::match(['get','post'],'/add-cart/','ProductController@addtocart');

//Cart page
Route::match(['get','post'], '/cart', 'ProductController@cart');

//Delete Item or  product from cart
Route::get('/cart/delete-item/{id}','ProductController@deleteCartItem');

//Updating quantity in cart
Route::get('/cart/add-quantity/{id}/{quantity}','ProductController@addCartQuantity');

//Apply coupon code
Route::post('cart/apply-coupon', 'ProductController@applyCoupon');

//User Login/Register Page View
Route::get('/login-register','UsersController@userLoginRegister');

//Forgot Password
Route::match(['get','post'],'/forgot-password','UsersController@forgotPassword');

//User Login Form Submit
Route::post('/user-login','UsersController@login');

//User Register Form submit
Route::post('/user-register','UsersController@register');
// ======================================================================================
//User Password Reset Routes
      //Forgot Password
      Route::get('/reset-form','Auth\ForgotPasswordController@showLinkRequestForm');
      Route::post('/email','Auth\ForgotPasswordController@sendResetLinkEmail');
      Route::post('/reset','Auth\ResetPasswordController@reset');
      Route::get('/reset/{token}','Auth\ResetPasswordController@showResetForm');
//==========================================================================================

//Confirm Email to activate account
Route::GET('confirm/{code}', 'UsersController@confirmAccount');

//User Logout
Route::get('/user-logout','UsersController@logout');

//Search Item
Route::post('/search-items','ProductController@searchItems');

//Front user Routes All route To protect account 
Route::group(['middleware'=>['frontlogin']],function(){
   //User Account Page
   Route::match(['get','post'], 'account','UsersController@account');
   //Check user old password
   Route::post('/check-user-pass','UsersController@checkUserPass');
   //Update user password
   Route::post('/update-user-pass','UsersController@updateUserPass');
   //Checkout Page
   Route::match(['get','post'],'/checkout','ProductController@checkout');
   //Order Review Page
   Route::match(['get','post'],'/order-review','ProductController@orderReview');
   //Order Place Page
   Route::match(['get','post'],'/place-order','ProductController@placeOrder');
   //Greeting page (Thank) after placed order
   Route::get('/thanks','ProductController@thanks');
   //Thanks after payment done
   Route::get('/paypal-thanks','ProductController@paypalThanks');
   //Paypal Payment Method
   Route::get('/paypal','ProductController@paypal');
   //Customer can view all the orders in account
   Route::get('/user-view-orders','ProductController@userViewOrders');
   //User ordered  view product page
   Route::get('/orders/{id}','ProductController@userOrderDetails');

}); 


//Admin Rotes Categories and Products Routes (Admin)
Route::group(['middleware' => ['adminlogin']], function(){ //Admin dashboard Routes
   Route::get('/admin/dashboard', 'AdminController@dashboard');
   Route::get('/admin/setting', 'AdminController@setting');
   Route::get('/admin/check-password', 'AdminController@checkPassword');
   Route::match(['get', 'post'], '/admin/update-password', 'AdminController@updatePassword');

  //Categories Routes CategoryController
   Route::match(['get','post'], 'admin/add-category','CategoryController@addCategory');
   Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
   Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
   Route::get('/admin/show-categories', 'CategoryController@showCategories');

   //Products Routes for ProductController
   Route::match(['get','post'], '/admin/add-product','ProductController@addProduct');
   Route::match(['get','post'], '/admin/edit-product/{id}', 'ProductController@editProduct');
   Route::get('/admin/show-products', 'ProductController@showProducts'); 
   Route::get('/admin/delete-product/{id}', 'ProductController@deleteProduct'); 
   Route::get('/admin/delete-product-image/{id}', 'ProductController@deleteProductImage');
   Route::get('/admin/delete-alt-image/{id}', 'ProductController@deleteAltImage');

   //Products Attributes ProductController
   Route::match(['get','post'], 'admin/add-attribute/{id}','ProductController@addAttribute');
   Route::match(['get','post'], 'admin/edit-attribute/{id}','ProductController@editAttribute');
   Route::match(['get','post'], 'admin/add-images/{id}','ProductController@addImages');
   Route::get('/admin/delete-attribute/{id}','ProductController@deleteAttribute');

   //Coupon Routes for CouponsController
   Route::match(['get','post'], 'admin/add-coupon','CouponsController@addCoupon');
   Route::get('admin/show-coupons', 'CouponsController@showCoupons');
   Route::match(['get','post'], 'admin/edit-coupon/{id}', 'CouponsController@editCoupon');
   Route::get('admin/delete-coupon/{id}', 'CouponsController@deleteCoupon');

   //admin Banners Routes
   Route::match(['get','post'], 'admin/add-banner','BannersController@addBanner');
   Route::match(['get','post'], 'admin/edit-banner/{id}','BannersController@editBanner');
   Route::get('admin/show-banners', 'BannersController@showBanners');
   Route::get('admin/delete-banner/{id}', 'BannersController@deleteBanner');

   //View Order List
   Route::get('admin/view-orders','ProductController@showOrderList');
   //View Order Details
   Route::get('admin/view-details/{id}','ProductController@viewDetails');
   //Order Invoice
   Route::get('/admin/order-invoice/{id}','ProductController@orderInvoice');

   //Update order status
   Route::post('admin/update-order-status','ProductController@updateStatus');

   //Admin Users Route
   Route::get('/admin/view-users','UsersController@showUsers');
   
});


//Admin Logout
Route::get('/logout', 'AdminController@logout');
