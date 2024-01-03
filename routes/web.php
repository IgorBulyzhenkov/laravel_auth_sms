<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group( function (){
    Route::get( '/register',                            [ RegisterController::class, 'register' ])->name('reg_page');
    Route::post('/register/create',                     [ RegisterController::class, 'create' ])->name('reg.create');

    Route::view('/login',                               'auth.login')->name('login');
    Route::post('/login/create',                        [ LoginController::class, 'createLogin' ])->name('login.create');

    Route::view('/verify',                              'auth.verify')->name('verify_page');
    Route::post('/verify/code',                         [ VerifyController::class, 'verifyCode' ])->name('verify.code');
});

Route::middleware('auth')->group( function (){
    Route::view('/',                                    'front.home')->name('home');
    Route::get('/logout',                               [ logoutController::class, 'logout'])->name('logout');
});
