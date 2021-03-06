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
Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
Route::post('/login', ['uses' => 'AuthController@postLogin']);
Route::post('/register', ['as' => 'register','uses' => 'AuthController@postRegister']);
Route::get('/search/api', ['uses' => 'Frontend\SearchController@getjson']);
Route::post('/search/result', ['uses' => 'Frontend\SearchController@getresuch']);
/* Login with social network */
Route::get('social/facebook', ['as'=>'facebook','uses'=>'FacebookController@getSocialAuth']);
Route::get('social/callback/facebook', ['uses'=>'FacebookController@getSocialAuthCallback']);
Route::get('social/google', ['as'=>'google','uses'=>'GoogleController@getSocial']);
Route::get('social/callback/google', ['uses'=>'GoogleController@getSocialCallback']);
Route::get('/', ['as' => 'home', 'uses' =>'AuthController@getHome']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

/* Link Admin can access */
Route::group(['middleware' => ['auth','roleadmin']], function () {
    Route::get('/admin', ['as' => 'admin', 'uses' => 'AuthController@getAdmin']);
    Route::group(['prefix'=>'admin', 'namespace' => 'Backend'], function () {
        Route::resource('user', 'UserController');
        Route::resource('food', 'FoodController');
        Route::resource('food_accept', 'FoodAcceptController');
        Route::resource('foodstore', 'FoodStoreController');
        Route::resource('type', 'TypeController');
        Route::post('accept', ['as' => 'foodaccept', 'uses' => 'AcceptController@update']);
    });
});
/* Link User can access */
Route::group(['middleware' => 'auth', 'namespace' => 'Frontend'], function () {
    Route::resource('food', 'FoodController');
    Route::resource('comment', 'CommentController', ['except' => ['destroy']]);
    Route::delete('/comment/{id?}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);
    Route::resource('profile', 'ProfileController');
    Route::post('profile/upload/', ['as' => 'profile.upload', 'uses' => 'ChangesImageController@upload']);
});
