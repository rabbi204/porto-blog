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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/****************************************************************************
*  For all admin controller
*****************************************************************************/
// for show admin login form
Route::get('admin/login',[App\Http\Controllers\AdminController::class, 'showAdminLoginForm']) -> name('admin.login');

// for show admin register form
Route::get('admin/register',[App\Http\Controllers\AdminController::class, 'showAdminRegisterForm']) -> name('admin.register');

// for show admin register form
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class, 'showAdminDashboard']) -> name('admin.dashboard');
