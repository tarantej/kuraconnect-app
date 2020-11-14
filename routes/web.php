<?php

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

Route::get('/', function () {
    return view('index');
});

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
  //All the admin routes will be defined here...

  Route::get('login',[App\Http\Controllers\admin\LoginController::class,'index']);
  Route::get('register',[App\Http\Controllers\admin\RegisterController::class,'index']);
  Route::get('dashboard',[App\Http\Controllers\admin\DashboardController::class,'index'])->name('home');

//   Route::get('/services',[App\Http\Controllers\api\ServiceController::class,'index']);
});





Auth::routes();

// Route::get('/admin/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('home');

// Route::get('/admin/register',[App\Http\Controllers\admin\DashboardController::class,'register']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
