<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
		'uses' => 'BlogController@index',
		'as' => 'blog'
	]);

// Route About
Route::get('/about', [
	'uses' => 'AboutController@index',
	'as' => 'about'
	]);

Route::get('/blog/{post}', [
	'uses' => 'BlogController@show',
	'as' => 'blog.show'
	]);

Route::get('/category/{category}', [
		'uses' => 'BlogController@category',
		'as' => 'category'
	]);

	Route::get('/author/{author}', [
			'uses' => 'BlogController@author',
			'as' => 'author'
	]);

Auth::routes();

Route::get('/home', 'Backend\HomeController@index');
// @override Route logout
Route::get('/logout', 'Auth\LoginController@logout');

Route::put('/backend/blog/restore/{blog}', [
		'uses' => 'Backend\BlogController@restore',
		'as'   => 'backend.blog.restore'
	]);
Route::delete('/backend/blog/force-destroy/{blog}', [
		'uses' => 'Backend\BlogController@forceDestroy',
		'as'   => 'backend.blog.force-destroy'
	]);

Route::resource('/backend/blog', 'Backend\BlogController', ['as' => 'backend']);

Route::resource('/backend/categories', 'Backend\CategoriesController', ['as' => 'backend']);

Route::get('/backend/users/confirm/{users}', [
		'uses' => 'Backend\UsersController@confirm',
		'as' => 'backend.users.confirm'
	]);

Route::resource('/backend/users', 'Backend\UsersController', ['as' => 'backend']);