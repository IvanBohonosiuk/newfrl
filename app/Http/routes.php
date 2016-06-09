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
})->name('main');

Route::get('/register', [
    'uses' => 'AuthController@getRegisterPage',
    'as' => 'register'
]);
Route::post('/register', [
    'uses' => 'AuthController@postRegister',
    'as' => 'register'
]);
Route::get('/login', [
    'uses' => 'AuthController@getLoginPage',
    'as' => 'login'
]);
Route::post('/login', [
    'uses' => 'AuthController@postLogin',
    'as' => 'login'
]);
Route::get('/logout', [
    'uses' => 'AuthController@getLogout',
    'as' => 'logout'
]);

Route::get('/projects', [
    'uses' => 'ProjectsController@index',
    'as' => 'projects'
]);

Route::get('/project/{id}', [
    'uses' => 'ProjectsController@show',
    'as' => 'projects.show'
]);

Route::get('/project/create', [
    'uses' => 'ProjectsController@create',
    'as' => 'projects.create',
    'middleware' => 'auth'
]);

Route::get('/project/category/{slug}', [
    'uses' => 'ProjectsController@cat_show',
    'as' => 'projects.category.show'
]);

Route::post('/create-bid', [
    'uses' => 'BidsController@postCreateBid',
    'as' => 'bid.create',
    'middleware' => 'auth'
]);

Route::get('/delete-bid/{bid_id}', [
    'uses' => 'BidsController@getDeleteBid',
    'as' => 'bid.delete',
    'middleware' => 'auth'
]);

Route::get('/dashboard', [
    'uses' => 'UserController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/dashboard/save', [
    'uses' => 'UserController@saveDashboard',
    'as' => 'account.save',
    'middleware' => 'auth'
]);