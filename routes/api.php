<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlcancesController;
use App\Http\Controllers\RecursosController;

Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');

Route::middleware(['auth:sanctum','ability:asda'])->group(function(){

});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//asd