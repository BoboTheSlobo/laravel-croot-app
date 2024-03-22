<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController; // Import the NewsController
use App\Http\Controllers\ActiveNewsController;
use App\Http\Controllers\UniversityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group that
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Define individual routes for LoginRegisterController actions
Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
Route::get('/students', [LoginRegisterController::class, 'students'])->name('students');
Route::get('/university-api', [LoginRegisterController::class, 'universityApi'])->name('universityApi');
Route::get('/profile', [LoginRegisterController::class, 'profile'])->name('profile');

Route::middleware('auth')->group(function () {
    // Define individual routes for DashboardController actions
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Define individual routes for NewsController actions
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store'); // Define store route for news
    Route::post('/news/filter', [NewsController::class, 'filter'])->name('news.filter');
});
  
// Define resource routes for ProductController
Route::resource('products', ProductController::class)->middleware('auth');

Route::resource('news', NewsController::class)->middleware('auth');

Route::get('/active-news', [ActiveNewsController::class, 'index'])->name('active-news.index');
Route::get('/university', [UniversityController::class, 'index'])->name('university');
Route::get('/store-universities', [UniversityController::class, 'storeUniversities']);