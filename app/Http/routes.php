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

Route::get('/', [
    'uses' => 'AppController@getIndex',
    'as' => 'home'
]);

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

Route::get('/projects/create', [
    'uses' => 'ProjectsController@createForm',
    'as' => 'project.create',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Customer']
]);

Route::post('/projects/create/save', [
    'uses' => 'ProjectsController@create',
    'as' => 'project.create.save'
]);

Route::get('/project/category/{slug}', [
    'uses' => 'ProjectsController@cat_show',
    'as' => 'projects.category.show'
]);

Route::post('/create-bid', [
    'uses' => 'BidsController@postCreateBid',
    'as' => 'bid.create',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Freelancer']
]);

Route::get('/delete-bid/{bid_id}', [
    'uses' => 'BidsController@getDeleteBid',
    'as' => 'bid.delete',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Freelancer']
]);

Route::get('/dashboard', [
    'uses' => 'UserController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/dashboard/save_basic', [
    'uses' => 'UserController@saveBasicProfile',
    'as' => 'account.save.basic',
    'middleware' => 'auth'
]);

Route::post('/dashboard/save_image', [
    'uses' => 'UserController@saveImageProfile',
    'as' => 'account.save.image',
    'middleware' => 'auth'
]);

Route::post('/dashboard/save_contacts', [
    'uses' => 'UserController@saveContactsProfile',
    'as' => 'account.save.contacts',
    'middleware' => 'auth'
]);

Route::post('/dashboard/save_pay', [
    'uses' => 'UserController@savePayProfile',
    'as' => 'account.save.pay',
    'middleware' => 'auth'
]);

Route::get('/users/{id}', [
    'uses' => 'UserController@getUser',
    'as' => 'user.show'
]);

Route::get('/freelancers', [
	'uses' => 'UserController@getFreelancers',
	'as' => 'freelancers'
]);

Route::get('/customers', [
	'uses' => 'UserController@getCustomers',
	'as' => 'customers'
]);

Route::get('/portfolio', [
	'uses' => 'UserController@getFormPortfolio',
	'as' => 'portfolio.add',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Freelancer']
]);

Route::post('/portfolio/save', [
	'uses' => 'UserController@savePortfolio',
	'as' => 'portfolio.save',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Freelancer']
]);

Route::post('/projects/{id}/use_freelancer', [
    'uses' => 'ProjectsController@use_freelancer',
    'as' => 'project.use_freelancer',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Customer']
]);

Route::post('/projects/{id}/completed', [
    'uses' => 'ProjectsController@completed',
    'as' => 'project.completed',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Customer']
]);

Route::post('/projects/{id}/canceled', [
    'uses' => 'ProjectsController@canceled',
    'as' => 'project.canceled',
    'middleware' => ['auth', 'roles'],
    'roles' => ['Admin', 'Customer']
]);

Route::get('/users/{id}/create_review', [
    'uses' => 'UserController@sendReview',
    'as' => 'user.review',
    'middleware' => 'auth'
]);

Route::post('/user/review/save', [
    'uses' => 'UserController@saveReview',
    'as' => 'user.review.save',
    'middleware' => 'auth'
]);