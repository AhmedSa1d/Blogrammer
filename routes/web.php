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
//authentication routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
//categories
//you can use only or except
Route::resource('categories','CategoryController',['except'=>['create','show']]);
//tags
Route::resource('tags','TagController',['except'=>['create']]);
//comments
//Route::resource('comments','CommentController',['except'=>['create']]);
Route::post('comments/{post_id}',['uses'=>'CommentController@store','as'=>'comments.store']);
Route::get('comments/{post_id}/edit',['uses'=>'CommentController@edit','as'=>'comments.edit']);
Route::put('comments/{post_id}',['uses'=>'CommentController@update','as'=>'comments.update']);
Route::delete('comments/{post_id}',['uses'=>'CommentController@destroy','as'=>'comments.destroy']);


Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('about','PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
//posts
Route::resource('posts','PostController');
