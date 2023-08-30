<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('index');
})->name('home');

// Auth
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');

// Chat
Route::resource('/chat', ChatController::class)->middleware('auth.basic');

// Dashboard
Route::resource('/dashboard', DashboardController::class)->middleware('auth.basic');

// Friends
Route::resource('friends', FriendController::class)->middleware('auth.basic');
Route::post('/friends/add-friend/{friend}', [FriendController::class, 'addFriend'])->name('add-friend')->middleware('auth.basic');

// Profile
Route::resource('profile', ProfileController::class)->middleware('auth.basic');
