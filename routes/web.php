<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/home', function(){
    return view('home');
});


Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/cashier', [AuthController::class, 'cashierLoginView'])->name('cashierLoginView');

Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('adminDashboard');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('adminLogin');

Route::get('/cashier/dashboard', [AuthController::class, 'cashierDashboard'])->name('cashierDashboard');
Route::post('/cashier/login', [AuthController::class, 'cashierLogin'])->name('cashierLogin');
