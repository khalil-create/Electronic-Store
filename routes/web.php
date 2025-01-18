<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\UserFollowerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('auth.login');
// });


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/items/search', [App\Http\Controllers\Admin\ItemController::class, 'ajax_search'])->name('items.ajax_search');

// Route::post('/users/{user}/follow', [UserFollowerController::class, 'store'])->name('users.follow');
// Route::delete('/users/{user}/unfollow', [UserFollowerController::class, 'destroy'])->name('users.unfollow');

Route::get('/items/show/{item}', [App\Http\Controllers\Admin\ItemController::class, 'show'])->name('show.item');
Route::get('/category/items/{cat}', [App\Http\Controllers\Admin\CategoryController::class, 'getCategoryItems'])->name('category.items');

Route::post('/cart/add/{item}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/empty', [CartController::class, 'empty'])->name('cart.empty');
Route::get('/cart/data', [CartController::class, 'getCartData'])->name('cart.data');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');


// Route::group(['prefix' => 'profile', 'namespace' => 'App\Http\Controllers\Admin'], function () {
//     Route::get('/index/{id}', 'ProfileController@index')->name('profile.index');
// });
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/index/{id}', 'ProfileController@index')->name('profile.index');
        Route::get('/edit/{user}', 'ProfileController@edit')->name('profile.edit');
        Route::put('/update/{id}', 'ProfileController@update')->name('update.profile');
        Route::get('/followers/{id}', 'ProfileController@followers')->name('user.followers');
    });
    // Route::group(['prefix' => 'posts'], function () {
    //     Route::get('/add', 'PostController@add')->name('add.post');
    //     Route::post('/store', 'PostController@store')->name('store.post');
    //     // Route::post('/search', 'PostController@ajax_search')->name('posts.ajax_search');
    //     Route::get('/edit/{id}', 'PostController@edit2')->name('edit.post');
    //     Route::put('/update/{id}', 'PostController@update')->name('update.post');
    //     Route::delete('/delete/{id}', 'PostController@delete')->name('delete.post');
    //     // Route::get('/show/{post}', 'PostController@show')->name('show.post');
    //     Route::post('/comment/{post}', 'PostController@comment')->name('comment.post');
    //     Route::get('/like/{post}', 'PostController@like')->name('like.post');
    // });
    Route::group(['prefix' => 'comments'], function () {
        Route::delete('/delete/{id}', 'CommentController@delete');
    });
    Route::post('/item/comment/{item}', [App\Http\Controllers\Admin\ItemController::class, 'comment'])->name('comment.item');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
    /*--------------------------------------- تهيئة النظام ---------------------------------------------------------------------------*/
    Route::group(['prefix' => 'system-variables'], function () {
        Route::get('/index', 'SystemVariableController@index')->name('system-variables.index');
        // Route::get('/edit/{systemVariable}', 'SystemVariableController@edit')->name('system-variables.edit');
        Route::put('/update/{sysVar}', 'SystemVariableController@update')->name('system-variables.update');
    });

    Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/index', 'UserController@index')->name('users.index');
        Route::get('/edit/{id}', 'UserController@edit');
        Route::post('/store', 'UserController@store');
        Route::put('/update/{id}', 'UserController@update');
        Route::delete('/delete/{id}', 'UserController@delete');
        Route::get('/activate/{id}', 'UserController@activate');
    });

    Route::group(['prefix' => 'items'], function () {
        Route::get('/index', 'ItemController@index')->name('items.index');
        Route::get('/edit/{id}', 'ItemController@edit');
        Route::post('/store', 'ItemController@store');
        Route::put('/update/{id}', 'ItemController@update');
        Route::delete('/delete/{id}', 'ItemController@delete');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/index', 'CategoryController@index')->name('categories.index');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/store', 'CategoryController@store');
        Route::put('/update/{id}', 'CategoryController@update');
        Route::delete('/delete/{id}', 'CategoryController@delete');
    });

    // Route::group(['prefix' => 'comments'], function () {
    //     Route::get('/index', 'CommentController@index')->name('comment.index');
    //     Route::get('/edit/{id}', 'CommentController@edit');
    //     Route::post('/store', 'CommentController@store');
    //     Route::put('/update/{id}', 'CommentController@update');
    //     Route::delete('/delete/{id}', 'CommentController@delete');
    // });
});

Auth::routes();
