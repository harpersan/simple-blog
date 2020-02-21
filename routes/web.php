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


Route::get('/view/{id}', function () {
    return view('view-blog');
});

Route::get('/view/{id}', 'PostController@viewPost');


Route::post('/comment', 'CommentController@comment')->name('comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create-post', function () {
    return view('post.create');
});

Route::post('/create-post', 'PostController@createPost');

Route::get('/edit-post/{id}', 'PostController@editPost');
Route::post('/update-post', 'PostController@updatePost');

Route::post('/delete-post/{id}', 'PostController@deletePost')->name('deletepost');

Route::get('/edit-profile', 'AdminDashboardController@editProfile');
Route::post('/update-profile', 'AdminDashboardController@updateProfile');

Route::get('/{name}', 'AdminDashboardController@viewProfile');
