<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  //public function products(){

  //    	return  $this->hasMany('App\Product','category_id','subcategory_id');
   //    }
    
    public function attributes(){

    	return $this->hasMany('App\ProductsAttribute','product_id');
    }
  
}
