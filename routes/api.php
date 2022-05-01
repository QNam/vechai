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

Route::post('/news', "NewsController@store")->name('api.news.insert');
Route::get('/news', "NewsController@get")->name('api.news.get');
Route::get('/news/{id}', "NewsController@get")->name('api.news.getOne');
Route::post('/news/remove', "NewsController@remove")->name('api.news.remove');

Route::post('/media/upload', "MediaController@upload")->name('api.media.upload');

Route::post('/fake/upload', function(){
    return response()->json([ 'status' => true ]);
});

Route::post('/nhaxe/upload', "ApiController@uploadFromNhaxe")->name('api.nhaxe.upload');
