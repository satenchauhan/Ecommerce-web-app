<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\mail;
use Validator;
use DB;

class UsersController extends Controller
{
    public function userLoginRegister(){
        //echo "test"; die;
        return view('users.login-register');
    }

    public function login(Request $request){
        $data = $request->all();
        if($request->isMethod('post')){
            //echo "<pre>"; print_r($data); die;
            $this->validate($request,[
                'email'=> 'required|',
                'password' => 'required|',
            ],[
                'email.required'=>'Please enter  your E-mail address !!',
                'password.required'=>'The enter your password !!'
            ]);
             
            if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])){
                $user_status = User::where('email',$data['email'])->first();
                if ($user_status->status == 0) {
                    return redirect()->back()->with('error','Your account is not activated ! Please check your email to activate your account !!');
                }
                Session::put('user_session',$request->input('email'));
                 
                if(!empty(Session::get('session_id'))) {
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email'=>$request->input('email')]);
                }
                  
                return redirect('/cart');

            }else{

                return redirect()->back()->with('error','The invalid Email or Password ! Try again !!');
            }
           
        }
        return view('users.login-register');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
        	$data = $request->all();
            // echo "<pre>"; print_r($data); die;
        	$this->validate($request,[
        		'name' => 'required|min:3|max:50|',
        		'email'=> 'required|max:50|unique:users|',
        		'password'=>'required|min:6|max:20|',
        	],[
        		'name.min'=>'Please enter  minimum 3 characters in name field !!',
        		'email.unique'=>'The email address already exists !!'
        	]);

        	$user_exists = User::where('email', $data['email'])->count();

        	if($user_exists > 0){
        	   return redirect()->back()->with('error','The Email address already exists !!');

        	}else{

                $user =  new User;
                $user->name = ucwords($request->input('name'));
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->save();
                
            //Send  Register Email
                // $email = $data['email'];
                // $message_data = ['email'=>$data['email'], 'name'=>ucwords($data['name'])];
                // Mail::send('emails.register',$message_data, function($message) use($email){
                //     $message->to($email)->subject('Registeration with Saten E-Shop Online');
                // });

            //Send Confirmation Email for account activation
                $email = $data['email'];
                $message_data = ['email' =>$data['email'], 'name'=>$data['name'],'code'=>base64_encode($data['email'])];

                Mail::send('emails.confirmation',$message_data, function($message) use($email){
                    $message->to($email)->subject('Confirm you Saten E-Shop Account');
                });

                return redirect()->back()->with('success','Please check your E-mail to confirm account activation !!');


                if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request['password']])){
                    Session::put('user_session',$request->input('email'));
                    return redirect('/cart');
                }

            }
        	//echo "<pre>"; print_r($data); die;
        }
    	return view('users.login-register');
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
           $data =  $request->all();
           //echo "<pre>"; print_r($data); die;
           $user_email_exist = User::where('email',$data['email'])->count();
           if($user_email_exist == 0){
              return redirect()->back()->with('error','The E-mail address does not exists');
           }

        }
        return view('users.forgot-password');
    }

    public function confirmAccount($email){
        $email = base64_decode($email); 
        $user_exist = User::where('email',$email)->count();

        if($user_exist > 0){
            $user = User::where('email',$email)->first();
            if($user->status == 1){
                return redirect('login-register')->with('success','Your account is already activated');
            }else{

                User::where('email',$email)->update(['status'=>1]);
            //Send  Welcome Email after activation of account
                $message_data = ['email'=>$email, 'name'=>ucwords($user->name)];
                Mail::send('emails.welcome',$message_data, function($message) use($email){
                    $message->to($email)->subject('Welcome to E-Shop Online store');
                });
                return redirect('login-register')->with('success','Your email is confirmed and activated your account ! now you may login');
            }
        }else{
            abort(404);
        }
    }

    public function account(Request $request){
        $user_id = Auth::user()->id;
        $edit_user = User::find($user_id);
        //echo "<pre>"; print_r($edit_user); die;
        $countries = Country::get();
        if($request->isMethod('post')){
            $data = $request->all();
            $this->validate($request,[
                'name'   => 'required|',
                'address'=> 'required|',
                'city'   => 'required|',
                'state'  => 'required|',
                'country'=> 'required|',
                'pincode'=> 'required|',
                'mobile' => 'required|',

            ]);
            
                $user = User::find($user_id);
                $user->name = ucwords($data['name']);
                $user->address = $data['address'];
                $user->city = ucwords($data['city']);
                $user->state = ucwords($data['state']);
                $user->country = $data['country'];
                $user->pincode = $data['pincode'];
                $user->mobile = $data['mobile'];
                $user->save();
                return redirect()->back()->with('success','Your profile details have been updated');

        }
        //echo "<pre>"; print_r($countries); die;
        return view('users.account',compact('countries','edit_user'));
    }

    public function checkUserPass(Request $request){
            $data = $request->all();
            $old_password = $data['current_pass'];
            $user_id = Auth::user()->id;
            $check_password = User::where('id',$user_id)->first();

            if(Hash::check($old_password, $check_password->password)){

                echo "true";  die;

            }else{

                echo "false"; die;
            }
    }

    public function updateUserPass(Request $request){
        if($request->isMethod('post')){
              $data = $request->all();
               //echo "<pre>"; print_r($data); die;
            $this->validate($request,[
                'current_pass' => 'required|',
                'new_pass' => 'required|min:6|max:20|',
                'confirm_pass' => 'required|min:6|max:20|',
            ],[
                'current_pass.required'=>'Please enter your current password !!',
                'new_pass.required'=>'Please enter your new password !!',
            ]);
            if ($data['new_pass'] != $data['confirm_pass']) {
                 return redirect()->back()->with('error','The confirm password does not match with new password');
            }
              $old_password = User::where('id',Auth::User()->id)->first();
              $db_password = $old_password->password;
              $current_pass = $data['current_pass'];

              if (Hash::check($current_pass,$db_password)) {
                  //Update password
                  $new_pass = Hash::make($data['new_pass']);

                  User::where('id',Auth::user()->id)->update(['password'=>$new_pass]);

                  return redirect()->back()->with('success','The password updated successfuly');
              }else{

                  return redirect()->back()->with('error','The current password is incorrent');
              }

        }


    }
    
    // public function check_email(Request $request){
    // //check if Email already exists
    //     $data = $request->all();
    //     $email_exists = User::where('email',$data['email'])->count();
    //     if ($email_exists > 0) {
    //        echo "false";
    //     }else{
    //         echo "success"; die;
    //     }

    // }

    public function showUsers(){
        $users = User::get();

        return view('users.view-users',compact('users'));
    }

    public function logout(){
        Auth::logout();
        Session::forget('user_session');
        Session::forget('session_id');
        return redirect('/');
    }
}
