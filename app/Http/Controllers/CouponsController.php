<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $this->validate($request,[
          	  'coupon_code'=>'required|min:5|max:15|unique:coupons|',
          	  'amount'=>'required|numeric|',
          	  'expiry_date'=>'required|',

          ],[

           	  'coupon_code.required'=>'All the fields are required !!',
           	  'coupon_code.min'=>'The coupon code must be atleast min 5 !!',
           	  'coupon_code.max'=>'The coupon code can be maximum 15 ! Not more than 15 !!',
           	  'coupon_code.unique'=>'The coupon code is already exist ! Enter different !!',
           	  'expiry_date.required'=>'Please select the date !!',

           ]);

		    

	        $coupon = new Coupon();
	        $coupon->coupon_code = $request['coupon_code'];
	        $coupon->amount      = $request['amount'];
	        $coupon->amount_type = $request['amount_type'];
	        $coupon->expiry_date = $request['expiry_date'];

	        if (empty($request->input('status'))) {
		       $status = 0;
		    }else{
		       $status = 1;
		    } 

	        $coupon->status = $status;
	        $coupon->save();
        
        
        // return redirect('/admin/add-coupon')->with('success','The Coupon has been generated !!');
        return redirect('/admin/show-coupons')->with('success','The Coupon has been generated !!');
        }
    	return view('admin.coupons.add-coupon')->with('success','The Coupon has been generated !!');
    }

    public function editCoupon(Request $request, $id){
        if ($request->isMethod('post')) {
        	$data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if (empty($request->input('status'))) {
                 $status = 0;
            }else{
                $status = 1;
            } 
	        Coupon::where(['id'=>$id])->update([
              'coupon_code' => $request['coupon_code'],
              'amount'      => $request['amount'],
      	      'amount_type' => $request['amount_type'],
      	      'expiry_date' => $request['expiry_date'],
      	      'status'      => $status,

    	    ]);

	        return redirect('/admin/show-coupons')->with('success','The coupon has been updated');
        }

        //$edit_data = Coupon::where(['id'=>$id])->first();
        $edit_data = Coupon::find($id);
        //$edit_data = json_decode(json_encode($edit_data));
        //echo "<pre>"; print_r($edit_data); die;

    	return view('admin.coupons.edit-coupon',compact('edit_data'));
    }

    public function showCoupons(){
       $coupons = Coupon::all();

    	return view('admin.coupons.show-coupons', compact('coupons'));
    }
    public function deleteCoupon($id){
    	 $coupon = Coupon::where(['id'=>$id]);
    	 $coupon->delete();

    	 return redirect('/admin/show-coupons')->with('success','The coupon has been deleted');
    }


}
