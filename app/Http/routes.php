<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route to show the login form 

Route::get('login' , array('uses' => 'LoginController@showLogin'));

//route to process the form 
Route::post('login' , array('uses' => 'LoginController@doLogin'));

//route to Home page
Route::get('Home' , array('uses' => 'HomeController@index'));

//route to about page

Route::get('About' , array('uses' => 'AboutController@index'));

//route to the blog page

Route::get('Blog' , array('uses' => 'BlogController@index'));

Route::get('logout' , array('uses' => 'LoginController@doLogout'));