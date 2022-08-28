<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// default route
Route::get('/', function () {
    return view('welcome');
});


// admin auth route
Route::middleware([
    'auth:sanctum,admin',
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('backend.index');
    })->name('dashboard');
});

// user auth route
Route::middleware([
    'auth:sanctum,web',
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('frontend.index');
    })->name('dashboard');
});


// admin rote
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){

    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store']);

});


// user rotues
Route::group(['prefix' => 'user'], function(){
    Route::get('/logout', [MainUserController::class, "Logout"]) -> name('user.logout');
    Route::get('/profile', [MainUserController::class, "UserProfile"]) -> name('user.profile');
    Route::post('/password/change', [MainUserController::class, "PasswordChange"]) -> name('user.pass.change');
    Route::get('/profile/edit/{id}', [MainUserController::class, "UserProfileEdit"]) -> name('user.profile.edit');
    Route::post('/profile/update/{id}', [MainUserController::class, "UserProfileUpdate"]) -> name('user.profile.update');
});


// admin rotues
Route::get('/admin/logout', [AdminController::class, "destroy"]) -> name('admin.logout');

