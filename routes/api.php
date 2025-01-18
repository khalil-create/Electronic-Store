<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'posts', 'namespace' => 'App\Http\Controllers\Api'], function () {
//     Route::get('/index', 'PostController@index');
//     Route::get('/show/{post}', 'PostController@show');
//     Route::post('/store', 'PostController@store');
//     Route::put('/update/{post}', 'PostController@update');
//     Route::delete('/delete/{post}', 'PostController@delete');
// });

Route::group(['middleware' => ['jwt.verify'], 'namespace' => 'App\Http\Controllers\Api'], function() {
    Route::group(['prefix' => 'items'], function () {
        Route::get('/index', 'ItemController@index');
        Route::get('/show/{post}', 'PostController@show');
        Route::post('/store', 'PostController@store');
        Route::put('/update/{post}', 'PostController@update');
        Route::delete('/delete/{post}', 'PostController@delete');
    });
});
