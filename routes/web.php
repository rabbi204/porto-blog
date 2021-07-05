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

Route::resource('post','App\Http\Controllers\PostController');