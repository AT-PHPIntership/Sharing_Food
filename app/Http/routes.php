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
Route::group(['middleware'=>['guest']], function () {
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('/login', ['uses' => 'AuthController@postLogin']);
    /* Login with social network */
    Route::get('social/facebook', ['as'=>'facebook','uses'=>'FacebookController@getSocialAuth']);
    Route::get('social/callback/facebook', ['uses'=>'FacebookController@getSocialAuthCallback']);
    Route::get('social/google', ['as'=>'google','uses'=>'GoogleController@getSocial']);
    Route::get('social/callback/google', ['uses'=>'GoogleController@getSocialCallback']);
});
Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

/* Link Admin can access */
Route::group(['middleware' => ['auth','roleadmin']], function () {
    Route::get('/admin', ['as' => 'admin', 'uses' => 'AuthController@getAdmin']);
});
/* Link User can access */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'home', 'uses' =>'AuthController@getHome']);
});
