<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use App\Product;
class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
          Validator::make($request->all(),[
            "category"=>"required|max:255|min:3|unique:categories|",  
            "url"=> "required|max:50|min:3"

        ],[

            "category.required"=>"The category name must be filled !!",
            "category.unique"=>"The category is already exists !!",
            "url.required"=>"The url must be written !!"

       ])->validate();

        if (empty($request->input('status'))) {
           $status = 0;
        }else{
           $status = 1;
        } 

	    	$category = new Category();
        $category->parent_id = $request->parent_id;
	    	$category->category = ucfirst($request->input('category'));
	    	$category->url = $request->input('url');
        $category->status = $status;
	    	$category->save();
        
	    	return redirect('/admin/show-categories')->with('success', 'The category has has been added successfuly');
        }

        $categories = Category::where(['parent_id'=>0])->get();
    	  return view('admin.categories.add-category',compact('categories'));
    }

    public function editCategory(Request $request, $id){
        if($request->isMethod('post')){
          $request->validate([

              "category"   => "required|",
              "url"        => "required|"
          ]);

           if (empty($request->input('status'))) {
             $status = 0;
           }else{
             $status = 1;
           } 

           $editcategory = $request->all();
           Category::where(['id'=>$id])->update([

              'parent_id'=> $editcategory['parent_id'],
              'category' => ucfirst($editcategory['category']),  
              'url'      => $editcategory['url'],
              'status'   => $status,

          ]);
            return redirect('/admin/show-categories')->with('success', 'The category has been updated');
        }

           $data  =  Category::find($id);
           $subcategories = Category::where(['parent_id'=>0])->get();
           return view ('admin.categories.edit-category', compact('data','subcategories'));
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        //Category::where(['id'=>$id])->delete();
        return redirect('/admin/show-categories')->with('success','The category '.$category->category_name.' has been deleted');
    }

    public function showCategories(){
    	//$categories =  Category::orderBy('id', 'asc')->paginate(3);
        //$categories =  Category::all();
        //$products = Product::all();  
       $categories =  Category::all();
      
    	return view('admin.categories.show-categories', compact('categories'));
    }

}
