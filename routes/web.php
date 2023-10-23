<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

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

// Route::get('/', [DashboardController::class, 'redirecionarDashboard'])->name('redirecionarDashboard');
Route::get('/login', [LoginController::class, 'redirecionarLogin'])->name('redirecionarLogin');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');

