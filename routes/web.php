<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('users-show');
});

Auth::routes();
Route::middleware('auth')->group(function(){
    Route::resource('/users', AdminController::class)->except(['show']);
    Route::controller(AdminController::class)->group(function(){
        Route::get('/users/editpass/{id}','editPassword')->name('users.editpass');
        Route::PUT('/users/updatepass/{id}','editPassword')->name('users.updatepass');
    });
    Route::get('/users-show', [UserController::class, 'index'])->name('users-show');
});

