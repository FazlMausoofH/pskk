<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::get('login', [AuthController::class, 'index']);
Route::post('user-login', [AuthController::class, 'login'])->name('user-login');

Route::middleware(['web', 'CheckLogin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    
    Route::get('transaction', [TransactionController::class, 'index']);
    Route::post('transaction/create', [TransactionController::class, 'create'])->name('create-transaction');
    Route::delete('transaction/delete/{id}', [DashboardController::class, 'delete'])->name('delete-transaction');
    
    Route::get('product', [ProductController::class, 'index']);
    Route::post('product/create', [ProductController::class, 'create'])->name('create-product');
    Route::put('product/edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::delete('product/delete/{id}', [ProductController::class, 'delete'])->name('delete-product');
    
    Route::get('user', [UserController::class, 'index']);
    Route::post('user/create', [UserController::class, 'create'])->name('create-user');
    Route::put('user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('delete-user');
    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
