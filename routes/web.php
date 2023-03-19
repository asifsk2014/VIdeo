<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\forntend\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/home',[HomeController::class, 'index']);
Route::get('/admin/login',[LoginController::class, 'index']);
Route::post('login_check',[LoginController::class, 'login_post']);
Route::get('admin/do_logout',[LoginController::class, 'do_logout']);

Route::get('admin/home',[PagesController::class, 'home']);


Route::get('admin/all_category',[CategoryController::class, 'all_category']);
Route::get('/buy-course',[HomeController::class, 'user_form']);
Route::post('video_course',[HomeController::class, 'buy_course']);

Route::get('/success', [HomeController::class, 'success']);
Route::post('/payment', [HomeController::class, 'payment']);

Route::post('/pay_check' , [HomeController::class, 'pay_check']);
Route::get('/error' , [HomeController::class, 'error']);




