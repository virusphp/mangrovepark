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
Route::resource('/backend/blog', 'Backend\BlogController', ['as' => 'backend']);