<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Auth Routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('login', [AuthController::class, 'postLogin'])->name('login'); 
Route::post('register', [AuthController::class, 'postRegister'])->name('register'); 

// Product Routes
Route::get('products', [ProductController::class, 'show'])->name('products');
Route::get('products/info/{id}', [ProductController::class, 'product'])->name('products.single');
Route::get('products/own', [ProductController::class, 'userProducts'])->name('products.own'); 
Route::get('products/add', [AuthController::class, 'addProduct'])->name('products.add'); 
Route::get('products/edit/{id}', [ProductController::class, 'editProduct'])->name('products.edit');

Route::post('products', [ProductController::class, 'store'])->name('products.add');

Route::put('products/update/{id}', [ProductController::class, 'update'])->name('products.update');

// Category Routes
