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
    return view('welcome');
});

Route::get('emailverif/{email}', 'UserController@mail');
Route::get('verification/{email_token}', ['as' => 'User.verif', 'uses'=>'UserController@verif']);


