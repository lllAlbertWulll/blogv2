<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/keywords', function (Request $request) {
    $keywords = \App\Keyword::select(['id', 'keyword'])
        ->where('keyword','like','%'.$request->query('keyword').'%')
        ->get();
    return $keywords;
});

Route::middleware('api')->get('/tags', function (Request $request) {
    $tags = \App\Tag::select(['id', 'tag'])
        ->where('tag','like','%'.$request->query('tag').'%')
        ->get();
    return $tags;
});
