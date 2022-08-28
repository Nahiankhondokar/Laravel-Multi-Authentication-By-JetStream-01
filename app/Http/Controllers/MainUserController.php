<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainUserController extends Controller
{
    /**
     *  user logout
     */
    public function Logout(){
        Auth::logout();
        return redirect() -> route('login');
    }


    /**
     *  user logout
     */
    public function UserProfile(){
        
        $id = Auth::user() -> id;
        $user = User::find($id);
        return view('frontend.user.user_profile', compact('user'));

    }

    /**
     *  user profile edit
     */
    public function UserProfileEdit($id){
       
        $user = User::find($id);
        return view('frontend.user.user_profile_edit', compact('user'));

    }

    /**
     *  user profile update
     */
    public function UserProfileUpdate($id, Request $request){
       
        // user photo
        if($request -> hasFile('image')){
            $img = $request -> file('image');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/frontend'), $unique);

            // image delete
            if(file_exists('media/frontend/' . $request -> old_image)){
                unlink('media/frontend/'. $request -> old_image);
            }

        }else {
            $unique = $request -> old_image;
        }

        // user updated
        $user = User::find($id);
        $user -> name               = $request -> name;
        $user -> email              = $request -> email;
        $user -> profile_photo_path = $unique;
        $user -> update();
        

        // toster msg
        $notify = [
            'message'   => "User profile updated",
            'alert-type'=> "info"
        ];

        return redirect() -> route('user.profile') -> with($notify);

    }


    /**
     *  user logout
     */
    public function PasswordChange(){
        
    }


    //     /**
    //  *  user logout
    //  */
    // public function Logout(){
    //     Auth::logout();
    //     return redirect() -> route('login');
    // }


}
