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

/*
|******************
| Resource Routes *
|******************
*/

Route::auth();

Route::group(['middleware' => ['auth', 'admin']], function() {
  Route::resource('posts', 'PostController');
});

Route::group(['middleware' => ['auth', 'admin']], function() {
  Route::resource('categories', 'CategoryController', ['except' => ['create', 'show', 'destroy']]);
});

Route::group(['middleware' => ['auth', 'admin']], function() {
  Route::resource('tags', 'TagController', ['except' => ['create']]);
});

Route::group(['middleware' => 'auth'], function() {
  Route::resource('comments', 'CommentController', ['except' => ['create', 'show', 'store']]);
});

/*
|*************
| GET Routes *
|*************
*/

Route::get('/', [
	'as' => 'home', 
	'uses' => 'PagesController@home'
]);

Route::get('king', [
	'as' => 'king', 
	'uses' => 'PagesController@king'
]);

Route::get('team', [
	'as' => 'team', 
	'uses' => 'PagesController@team'
]);

Route::get('photos', [
	'as' => 'photos', 
	'uses' => 'PagesController@photos'
]);

Route::get('testimonials', [
	'as' => 'testimonials', 
	'uses' => 'PagesController@testimonials'
]);

Route::get('services', [
	'as' => 'services', 
	'uses' => 'PagesController@services'
]);

Route::get('contact', [
	'as' => 'contact',
	'uses' => 'ContactController@contact'
]);

Route::get('facility', [
	'as' => 'facility', 
	'uses' => 'PagesController@facility'
]);

Route::get('blog', [
	'as' => 'blog', 
	'uses' => 'BlogController@getIndex'
]);

Route::get('blog/{slug}', [
	'as' => 'blog.single', 
	'uses' => 'BlogController@getSingle'
])->where('slug', '[\w\d\-\_]+');

Route::get('comments/{id}/delete', [
	'as' => 'comments.delete', 
	'uses' => 'CommentController@delete'
	]);

/*
|**************
| POST Routes *
|**************
*/

Route::post('contact', [
	'as' => 'contact_post',
	'uses' => 'ContactController@ContactForm'
]);

Route::post('comments/{post_id}', [
	'middleware' => 'auth',
	'as' => 'comments.store',
	'uses' => 'CommentController@store'
]);






