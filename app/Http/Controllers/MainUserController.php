<?php

namespace App\Http\Controllers;

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
}
