<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/****************************************************************************
*  For Admin Teamplate Load
*****************************************************************************/
// for show admin login form
Route::get('admin/login',[App\Http\Controllers\AdminController::class, 'showAdminLoginForm']) -> name('admin.login');
// for show admin register form
Route::get('admin/register',[App\Http\Controllers\AdminController::class, 'showAdminRegisterForm']) -> name('admin.register');
// for show admin register form
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class, 'showAdminDashboard']) -> name('admin.dashboard');


// admin login
Route::post('admin/login',[App\Http\Controllers\Auth\LoginController::class, 'login']) -> name('admin.login');
// admin logout
Route::post('admin/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']) -> name('admin.logout');
// admin register
Route::post('admin/register',[App\Http\Controllers\Auth\RegisterController::class, 'register']) -> name('admin.register');



                /****************************************************************************
                *  For All Admin Post route
                *****************************************************************************/
// for post route
Route::resource('post','App\Http\Controllers\PostController');

// for post trash
Route::get('post-trash','App\Http\Controllers\PostController@postTrash') -> name('post.trash');
// for post trash update
Route::get('post-trash-update/{id}','App\Http\Controllers\PostController@postTrashUpdate') -> name('post.trash.update');

// for post check inactive
Route::get('post/status-inactive/{id}','App\Http\Controllers\PostController@statusUpdateInactive');
// for post check active
Route::get('post/status-active/{id}','App\Http\Controllers\PostController@statusUpdateActive');

// for category route
Route::resource('category','App\Http\Controllers\CategoryController');
// for category check inactive
Route::get('category/status-inactive/{id}','App\Http\Controllers\CategoryController@statusUpdateInactive');
// for category check active
Route::get('category/status-active/{id}','App\Http\Controllers\CategoryController@statusUpdateActive');

// for Tag route
Route::resource('tag','App\Http\Controllers\TagController');
// for tag check inactive
Route::get('tag/status-inactive/{id}','App\Http\Controllers\TagController@statusUpdateInactive');
// for tag check active
Route::get('tag/status-active/{id}','App\Http\Controllers\TagController@statusUpdateActive');




/**
 *  frontend route
 */
Route::get('blog', [App\Http\Controllers\BlogPageController::class, 'showBlogPage']);
Route::get('blog/single', [App\Http\Controllers\BlogPageController::class, 'showSingleBlogPage']);





