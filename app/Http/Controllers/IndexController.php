<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;

class IndexController extends Controller
{
    public function index(){

        // In AScending order (by default)
        $allproducts = Product::where('status',1)->where('feature_item',1)->get();
        $allproducts = json_decode(json_encode($allproducts));
        //echo "<pre>"; print_r($allproducts); die;
        // dump( $allproducts);
    	// In Descending order
    	//$allproducts = Product::orderBy('id','DESC')->get();

    	//Random Order
    	//$allproducts = Product::inRandomOrder()->get();

    	$categories =  Category::with('categories')->where(['parent_id'=>0])->get();
    	// $categories = json_decode(json_encode($categories));
        // echo "<pre>"; print_r($categories); die;

        //Get all banners
        $banners = Banner::where('status','1')->get();


    	return view('index',compact('allproducts','categories','banners'));
    }
}
