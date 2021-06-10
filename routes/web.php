<?php

use App\Http\Livewire\PostinganIndex;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/your-post', [App\Http\Controllers\HomeController::class, 'yourPost'])->name('your-post');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/liked-post', [App\Http\Controllers\HomeController::class, 'likedPost'])->name('liked-post');

Route::get('/cek', [App\Http\Controllers\HomeController::class, 'cek']);
