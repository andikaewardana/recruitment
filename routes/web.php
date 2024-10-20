<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DivisiController;
use App\Http\Controllers\Backend\ReportController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.validasi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::resource('/report', ReportController::class)->middleware('auth');


/*
/--------------------------------------------------------------------------
/ Routes Untuk Hak Akses Admin
/--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    
    Route::resource('/user', UserController::class);
    Route::resource('/divisi', DivisiController::class);
    
});


/*
/--------------------------------------------------------------------------
/ Routes Untuk Hak Akses User
/--------------------------------------------------------------------------
*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {
    
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::resource('/report', ReportController::class)->middleware('auth');

// });
