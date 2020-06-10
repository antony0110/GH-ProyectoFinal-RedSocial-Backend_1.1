<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('users')->group(function () {
    Route::post('/register','UserController@register');
    Route::post('/login','UserController@login');
    Route::get('/logout','UserController@logout');
    Route::middleware('auth:api')->group(function (){
    Route::get('/info', 'UserController@getUserInfo');
    Route::post('/image','UserController@uploadImage');
        });
});
Route::prefix('posts')->group(function () {
Route::middleware('auth:api')->group(function (){
Route::post('/insert','PostController@insert');
Route::post('/like/{id}','LikeableController@like');
Route::post('/dislike/{id}','LikeableController@dislike');
});
Route::get('/getAll','PostController@GetAll');
Route::get('/PostByUser','PostController@PostByUser');
});