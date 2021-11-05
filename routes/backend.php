<?php

use App\Http\Controllers\staff\BrandController;
use App\Http\Controllers\staff\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/staff')->name('staff.')->middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Brand Route
    ROute::prefix('/brand')->name('brand.')->group(function(){
        Route::get('/index', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
    });
    
});