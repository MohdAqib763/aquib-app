<?php

use Illuminate\Http\Request;

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


// User Register Authentication


Route::view('/','Authentication.register')->name('/');
Route::view("Register",'Authentication.Register')->name('Register');
Route::post('User-Store','Authentication\AuthController@UserStore')->name('User-Store');

// 

// 
Route::get('AdminLogin','AdminController@AdminLogin')->name('AdminLogin');
Route::post('LoginAdmin','AdminController@LoginAdmin');
Route::get('AdminRegister','AdminController@AdminRegister');
Route::post('AdminStore','AdminController@AdminStore');
Route::get('Logout','AdminController@Logout')->name('Logout');






/** Owner Admin Routes */
Route::group(["prefix" => "Admin", "middleware" => "AdminMiddleware"],function () {
    // user list

    

    Route::get('Dashboard','AdminController@Dashboard')->name('Dashboard');
    Route::get('user-list','AdminController@UsersShowList')->name('user-list');
    Route::post('user-delete','AdminController@UserRemove')->name('user-delete');  
    
    
   
   
    Route::get('user-profile','Users\UserController@User')->name('user-profile');
    Route::post('User-Profile-Update','Users\UserController@ProfileUpdate')->name('user-profile-update');
    
    
    Route::post('user-status','AdminController@ChangeStatus')->name('user-status');
    Route::get('edit-user/{id}','AdminController@EditUser')->name('edit-user');
    Route::post('edit-user-Update','AdminController@ProfileUpdate')->name('edit-user-Update');

   
});


Route::group(["prefix" => "User", "middleware" => "UserMiddleware"],function () {
    // user list

    

    Route::get('user-profile','Users\UserController@User')->name('user-profile');
    Route::post('User-Profile-Update','Users\UserController@ProfileUpdate')->name('User-Profile-Update');
    
    
    Route::post('user-status','AdminController@ChangeStatus')->name('user-status');
    // Route::get('edit-user/{id}','AdminController@EditUser')->name('edit-user');
    // Route::post('edit-user-Update','AdminController@ProfileUpdate')->name('edit-user-Update');
    
    
   
   

   
});