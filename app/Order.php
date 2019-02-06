<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orders(){

    	return $this->hasMany('App\OrdersProduct','order_id');
    }

    public static function getOrderData($order_id){

    	return $getOrderDetails;
    }

    public static function getCountryCode($country){

    	$getCountryCode = Country::where('country_name',$country)->first();
    	return $getCountryCode;
    }
}
