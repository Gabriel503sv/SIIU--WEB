<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

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
    return redirect()->route('login');
});
//Iniciar session
Route::get('Login', [AuthController::class, 'login'])->name('login');
//Verficar datos de session
Route::post('Login', [AuthController::class, 'loginVerify'])->name('login.verify');
//Cerrar session
Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');




Route::middleware('auth')->group(function () {
    //DASHBOAR
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //usuario
    Route::resource('user', UserController::class);
    //Roles
    Route::resource('role',RoleController::class);
});
