<?php

use App\Http\Controllers\CatagoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'catagory', 'as' => 'catagory.'], function() {
    Route::get('/index', [CatagoryController::class, 'index'])->name('index');
  
});