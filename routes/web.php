<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/show/{id}', 'HomeController@show');
Route::get('/about', 'HomeController@about');
Route::get('/jianli', 'HomeController@jianli');

/*********** comment ***********/
Route::post('/comment/store', 'CommentController@store')->name('addComment');

/*********** admin ***********/
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/profile', 'AdminController@profile');
Route::put('/admin/profile/{id}', 'AdminController@profileUpdate');
Route::get('/admin/social', 'AdminController@social');
Route::get('/admin/password/reset', 'AdminController@passwordReset');

/****** article ******/
Route::get('/admin/article/index', 'ArticleController@index');
Route::get('/admin/article/add', 'ArticleController@add');
Route::post('/admin/article/store', 'ArticleController@store');
Route::get('/admin/article/edit/{id}', 'ArticleController@edit');
Route::put('/admin/article/update/{id}', 'ArticleController@update');
Route::get('/admin/article/delete/{id}', 'ArticleController@delete');
Route::get('/admin/article/trash', 'ArticleController@trash');
Route::get('/admin/article/destroy/{id}', 'ArticleController@destroy');
Route::get('/admin/article/recovery/{id}', 'ArticleController@recovery');

/****** comment ******/
Route::get('/admin/comment/index', 'CommentController@index');
Route::get('/admin/comment/trash', 'CommentController@trash');
Route::get('/admin/comment/delete/{id}', 'CommentController@delete');
Route::get('/admin/comment/destroy/{id}', 'CommentController@destroy');
Route::get('/admin/comment/recovery/{id}', 'CommentController@recovery');

/****** setting ******/
Route::get('/admin/website', function () {
    return view('admin.setting.website');
});
