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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/myPost', 'HomeController@myPost')->name('myPost');
Route::post('/user/createPost', 'UserController@createPost')->name('createPost');
Route::get('/user/toUpdatePost/{id}', 'UserController@toUpdatePost')->name('toUpdatePost');
Route::post('/user/updatePost', 'UserController@updatePost')->name('updatePost');
Route::post('/user/deletePost', 'UserController@deletePost')->name('deletePost');
Route::post('/user/createComment/', 'UserController@createComment')->name('createComment');
Route::post('/user/updateComment', 'UserController@updateComment')->name('updatenowComment');
Route::get('/user/updateComment/{id}', 'UserController@toComment')->name('updateComment');
Route::post('/user/deleteComment', 'UserController@deleteComment')->name('deleteComment');


