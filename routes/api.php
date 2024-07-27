<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlcancesController;

Route::post('/login', [AuthController::class, 'auth']);

Route::middleware('auth:sanctum')->group(function(){
    Route::any('/index' , [AlcancesController::class,'index'])->name('alcances.index');
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
