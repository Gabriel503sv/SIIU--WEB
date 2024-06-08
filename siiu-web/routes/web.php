<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);
	

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');



	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');
    
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('contact', function () {
	return view('contact');
})->name('contact');

Route::get('dashboard', function () {
	return view('dashboard');
})->name('dashboard');

Route::get('profile', function () {
	return view('profile');
})->name('profile');

Route::get('user-management', function () {
	return view('laravel-examples/user-management');
})->name('user-management');

Route::get('user-rol', function () {
	return view('laravel-examples/user-rol');
})->name('user-rol');