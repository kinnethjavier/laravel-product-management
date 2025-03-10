<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// Default Route
Route::get('/', [ProductController::class, 'show'])->name('products');

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
Route::get('products/add', [ProductController::class, 'addProduct'])->name('products.add'); 
Route::get('products/edit/{id}', [ProductController::class, 'editProduct'])->name('products.edit');

Route::post('products', [ProductController::class, 'store'])->name('products.add');

Route::put('products/update/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');

// Category Routes
Route::get('categories', [CategoryController::class, 'show'])->name('categories');
Route::get('categories/add', [CategoryController::class, 'addCategory'])->name('categories.add');
Route::get('categories/edit/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');

Route::post('categories', [CategoryController::class, 'store'])->name('categories.add');

Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

// User Management Routes
Route::get('users', [UserController::class, 'show'])->name('users');
Route::get('users/password', [UserController::class, 'editPassword'])->name('users.update.password');

Route::put('users/update/password', [UserController::class, 'updatePassword'])->name('users.update.password');
Route::put('users/update/pm/{id}', [UserController::class, 'updatePM'])->name('users.update.pm');
Route::put('users/update/cm/{id}', [UserController::class, 'updateCM'])->name('users.update.cm');

Route::delete('users/delete/{id}', [UserController::class, 'destroy']) ->name('users.delete');