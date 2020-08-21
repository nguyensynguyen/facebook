<?php

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'check1'], function ()
{
Route::get('/home', 'SocialAuthController@homes');
});

Route::get('/auth/facebook', 'SocialAuthController@redirectToProvider');
Route::get('/auth/facebook/callback', 'SocialAuthController@handleProviderCallback');

Route::get('/auth/google', 'SocialAuthController@redirectToProvidergoogle');
Route::get('/auth/google/callback', 'SocialAuthController@handleProviderCallbackgoogle');
Route::get('/vue',function ()
{
	return view('vuetify');
});