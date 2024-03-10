<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProspectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ProspectionController::class)->prefix('insurance')->name('prospection.')->group(function(){
	Route::get('/', 'index')->name('index');
	Route::post('/', 'store')->name('store');
});
