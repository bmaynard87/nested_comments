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

Route::get('/', 'PageController@index');
Route::post('/post/{post_id}/comments', 'CommentController@store');
Route::get('/post/{post_id}', 'PostController@show');
Route::get('/posts/{post_id}', 'PostController@show');
Route::get('/post', 'PageController@index');
Route::get('/posts', 'PageController@index');
Route::post('/comment/{comment_id}', 'CommentController@reply');