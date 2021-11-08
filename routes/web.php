<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AllUserDashboardController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\SearchUserController;
use Illuminate\Support\Facades\Route;


// login route
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store']);

// register route
Route::get('/register', [RegisterController::class, 'index'])
->name('register')
->middleware(['guest']);
Route::post('/register', [RegisterController::class, 'store'])
->middleware('guest');

// logout route
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

// all users dashboard route
Route::get('/users', [AllUserDashboardController::class, 'index'])
->name('allusers')
->middleware('auth');
Route::post('/users', [AllUserDashboardController::class, 'createNewUser'])
->name('createNewUser')
->middleware('auth');
Route::get('/users/download', [AllUserDashboardController::class, 'download'])
->name('downloadAllUser')
->middleware('auth');

// edit user route
Route::get('/user/edit/{user}', [EditUserController::class, 'index'])
->name('editUser')
->middleware('auth');
Route::post('/update/{user}', [EditUserController::class, 'update'])
->name('updateUser')
->middleware('auth');
Route::delete('/user/{user}', [EditUserController::class, 'destroy'])
->name('user.destroy')
->middleware('auth');

// search user route
Route::post('/search', [SearchUserController::class, 'index'])
->name('searchUser')
->middleware('auth');
// Route::post('/search', [SearchUserController::class, 'search'])
// ->middleware('auth');



