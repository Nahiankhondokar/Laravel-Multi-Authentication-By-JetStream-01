<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainAdminController extends Controller
{

    /**
     *  admin profile
     */
    public function AdminProfile(){
        
        $admin = Admin::find(1);
        return view('backend.admin.admin_profile', compact('admin'));

    }


    /**
     *  admin profile edit
     */
    public function AdminProfileEdit(){
        $admin = Admin::find(1);
        return view('backend.admin.admin_profile_edit', [
            'admin' => $admin
        ]);
    }

    /**
     *  admin profile Update
     */
    public function AdminProfileUpdate($id, Request $request){
       
        // user photo
        if($request -> hasFile('image')){
            $img = $request -> file('image');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/backend'), $unique);

            // image delete
            if(file_exists('media/backend/' . $request -> old_image)){
                unlink('media/backend/'. $request -> old_image);
            }

        }else {
            $unique = $request -> old_image;
        }

        // user updated
        $admin = Admin::find($id);
        $admin -> name               = $request -> name;
        $admin -> email              = $request -> email;
        $admin -> profile_photo_path = $unique;
        $admin -> update();
        

        // toster msg
        $notify = [
            'message'   => "Admin profile updated",
            'alert-type'=> "info"
        ];

        return redirect() -> route('admin.profile') -> with($notify);

    }


    /**
     *  admin password view
     */
    public function PasswordChangeView(){

        $admin = Admin::find(1);
        return view('backend.admin.password_change', [
            "admin"  => $admin
        ]);
    }

    /**
     *  admin password update
     */
    public function PasswordUpdate(Request $request){

        // validaiton
        $this -> validate($request, [
            'old_pass'      => 'required'
        ], [
            "old_pass.required"   => "Password Feild is require"
        ]);

        // checking password
        if($request -> new_pass != $request -> password_confirmation){
            // toster msg
            $msg = [
                'message'   => "Password Not Match",
                'alert-type'=> "error"
            ];
            return redirect() -> back() -> with($msg);
        }
        
        // find user
        $hasPass = Admin::find(1) -> password;

        // password hash
        if(Hash::check($request -> old_pass, $hasPass)){

            // user find 
            $admin = Admin::find(1);

            // user password updated
            $admin -> password  = Hash::make($request -> new_pass);
            $admin -> update();
            Auth::logout();
            return redirect() -> route('admin.login');
        
        }else {

            // toster msg
            $msg = [
                'message'   => "Wrong Password",
                'alert-type'=> "error"
            ];
            return redirect() -> back() -> with($msg);
        }
       
        
    }


}
