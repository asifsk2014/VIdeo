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


Route::get('/',[HomeController::class, 'index']);
Route::get('/admin/login',[LoginController::class, 'index']);
Route::post('login_check',[LoginController::class, 'login_post']);
Route::get('admin/do_logout',[LoginController::class, 'do_logout']);

Route::get('admin/home',[PagesController::class, 'home']);


Route::get('/buy-course',[HomeController::class, 'user_form']);
Route::get('about',[HomeController::class, 'about']);
Route::get('terms-condition',[HomeController::class, 'terms']);
Route::get('/buy-video-course',[HomeController::class, 'user_video_course']);
Route::post('video_course',[HomeController::class, 'buy_course']);

Route::get('/success', [HomeController::class, 'success']);
// Route::post('/payment', [HomeController::class, 'payment']);

Route::post('/pay_check' , [HomeController::class, 'pay_check']);
Route::get('/error' , [HomeController::class, 'error']);


Route::get('admin/category' , [CategoryController::class, 'all_category']);
Route::get('admin/all_category',[CategoryController::class, 'all_category']);

// Route::get('admin/category',array('uses'=>'admin\CategoryController@category'));

// Route::post('post_category',array('uses'=>'admin\CategoryController@category_post'));

// Route::get('admin/all_category',array('uses'=>'admin\CategoryController@all_category'));

// Route::get('admin/category/edit/{id}',array('uses'=>'admin\CategoryController@edit_page'));


