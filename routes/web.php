<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::group(['middleware' => 'revalidate'], function(){
    Auth::routes();
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(ProfileController::class)->group(function(){
        Route::post('/editprofilepicture', 'EditProfilePicture')->name('profile.picture');
        Route::get('/editprofilepicture', 'index')->name('picture');
        Route::get('/editpasword', 'ChangePassword')->name('password');
        Route::post('/updatepassword', 'UpdatePassword')->name('update.password');
        
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
    });
});