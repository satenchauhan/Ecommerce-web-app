<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use App\User;
use App\Admin;


class AdminController extends Controller
{

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $input_pass = $data['password']; 
            $admin_db = Admin::where(['email'=>$data['email']])->first();
           //echo  $admin->password; die;
            $dehashed_pass = Hash::check($input_pass,$admin_db->password);
           //$dehashed_password = password_verify($pass,$admin->password);
           //if($dehashed_password == $admin->password){
           if($input_pass == $dehashed_pass){
               //echo "success"; die;
               Session::put('session_admin', $data['email']);
               
               return redirect('admin/dashboard');

            }else{
                
                //echo 'Failed'; die;
                return redirect('/admin')->with('error', 'Invalid username or password');
            }
        }
        return view('admin.admin-login');
    }

    public function dashboard(){
        // if(Session::has('session_admin')) {
            
        // }else{
        //     return redirect('/admin')->with('error','You are not allowed without login !! Please login to access the page');
        //     //return redirect()->action('AdminController@login')->with('error','Unauthorized access without login !! Please login to access');
        // }

        return view('admin.dashboard');
    }

    public function setting(){

        $admin_details = Admin::where(['email'=>Session::get('session_admin')])->first();
        //echo "<pre>"; print_r($admin_details); die;
        return view('admin.update',compact('admin_details'));
    }

    public function checkPassword(Request $request){
        $data =  $request->all();
        $current_password = $data['current_pwd'];
        $admin_db = Admin::where(['email' =>Session::get('session_admin')])->first();
        $dehaseh_pass =  Hash::check($current_password, $admin_db->password);
        //echo "<pre>"; print_r($pass); die;
        if(($current_password == $dehaseh_pass)){

            echo "true"; die;

        }else{

            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->input();
            $this->validate($request,[
                'current_pwd' => 'required|',
                'new_pwd' => 'required|min:6|max:20|',
                'confirm_pwd' => 'required|min:6|max:20|',
            ],[
                'current_pwd.required'=>'Please enter your current password !!',
                'new_pwd.required'=>'Please enter your new password !!',
                'confirm_pwd.required'=>'Please enter your confirm password !!',
            ]);
            // echo "<pre>"; print_r($data); die;
            $current_pass = $data['current_pwd'];
            $admin_db = Admin::where(['email'=>Session::get('session_admin')])->first();
            //echo "<pre>"; print_r($admin->password); die;
            $dehaseh_pass =  Hash::check($current_pass, $admin_db->password);
            if($current_pass == $dehaseh_pass){
           //if(Hash::check($current_pass,$admin->password)){
                //echo "success"; die;
                //Hashed the password
                $hashed_pass = Hash::make($data['new_pwd']);

                Admin::where('email',Session::get('session_admin'))->update(['password'=>$hashed_pass]);

                return redirect('/admin/update')->with('success', 'Password has been changed successfully !! Please login again !!');

            }else{
                
                return redirect('/admin/update')->with('error', 'Password updation failed !! Try again');
            }

        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('success', 'You logged out successfuly');
    }


}
