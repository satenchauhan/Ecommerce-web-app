<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\Banner;

class BannersController extends Controller
{
    public function addBanner(Request $request){
        if($request->isMethod('post')){
         	$data = $request->all();
         	//$data = json_decode(json_encode($data));
         	//echo "<pre>"; print_r($data); die;
         	 $this->validate($request,[
          	  'image'=>'required|',
              'title'=>'required|',
          	  'link'=>'required|',
          ],[
           	  'image.required'=>'Please select image !!',
           	  'title.required'=>'Please enter title  name !!',
           	  'link.required'=>'Please enter link  !!',

           ]);
            //===========================OR===========================================
            
              
      		$banner = new Banner();
      		$banner->title = ucwords($data['title']);
      		$banner->link  =  $data['link'];
            $banner->image =  $data['image'];

        	if($request->hasFile('image')){

				$image_tmp = Input::file('image');

				if($image_tmp->isValid()){

					$extension = $image_tmp->getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$banner_path = 'images/fimages/banners/'.$filename;
					
					//Resize Images
					Image::make($image_tmp)->resize(1140,441)->save($banner_path);
					//Store images name in products table
					$banner->image =  $filename;
				}
        	}

            if(empty($request->input('status'))){
	            $status = 0;
	        }else{
	            $status = 1;
	        } 
            $banner->status = $status;
      	    $banner->save();
            
            //return redirect()->back()->with('success','The banner has been added successfuly !!');
    		return redirect('/admin/show-banners')->with('success','The banner has been added successfuly !!');
    	}
  
       return view('admin.banners.add-banner');
    }
    public function editBanner(Request $request,$id){
       if($request->isMethod('post')){
         	$data = $request->all();
         	//$data = json_decode(json_encode($data));
         	//echo "<pre>"; print_r($data); die;
         	 $this->validate($request,[
          	  'image'=>'required|',
              'title'=>'required|',
          	  'link'=>'required|',
          ],[
           	  'image.required'=>'Please select image !!',
           	  'title.required'=>'Please enter title  name !!',
           	  'link.required'=>'Please enter link  !!',

           ]);

            if(empty($request->input('status'))){
	            $status = 0;
	        }else{
	            $status = 1;
	        } 

        	if($request->hasFile('image')){

				$image_tmp = Input::file('image');

				if($image_tmp->isValid()){
					$extension = $image_tmp->getClientOriginalExtension();
					$filename = rand(111,99999).'.'.$extension;
					$banner_path = 'images/fimages/banners/'.$filename;
					//Resize Images
					Image::make($image_tmp)->resize(1140,441)->save($banner_path);
						
				}

        	}else if(!empty($data['current_image'])){
				$filename = $data['current_image'];

			}else{
				   
			    $filename = '';
			}

           Banner::where(['id'=>$id])->update([
           'title' => ucwords($data['title']),
  	       'link'  => $data['link'],
           'status'=> $status,
           'image' =>  $filename
	      ]);
            
            return redirect()->back()->with('success','The banner has been added successfuly !!');
    		//return redirect('/admin/show-banners')->with('success','The banner has been added successfuly !!');
    	} 
        
       $edit_banner = Banner::where('id',$id)->first();
       return view('admin.banners.edit-banner',compact('edit_banner'));
    }

    public function showBanners(){
        
       $banners =  Banner::all();
        //echo "<pre>"; print_r($banners); die;
       return view('admin.banners.show-banners',compact('banners'));
    }
    public function deleteBanner($id){
        
        $banner_image =  Banner::where(['id'=>$id])->first();
        //echo "<pre>"; print_r($banners); die;
        $banner_path = 'images/fimages/banners/';

        if (file_exists($banner_path.$banner_image->image)) {
            unlink($banner_path.$banner_image->image);
        }
        //Banner::where(['id'=>$id])->update(['image'=>'']);
        Banner::where(['id'=>$id])->delete();
        return redirect('admin/show-banners')->with('success','The bannaer image has been deleted');
    }
}
