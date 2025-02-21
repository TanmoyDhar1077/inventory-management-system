<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('index');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete'); 
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
});
