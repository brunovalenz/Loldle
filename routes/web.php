<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcancesController;
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\DashBoard;

Route::get('/dashboard', [DashBoard::class,'dashboard'])->name('dashboard');

Route::prefix('alcances') -> group(function(){

    Route::any('/index' , [AlcancesController::class,'index'])->name('alcances.index');
    Route::get('/create', [AlcancesController::class, 'create'])->name('alcances.create');
    Route::get('/edit/{id}', [AlcancesController::class, 'edit'])->name('alcances.edit');
    Route::get('/show/{id}', [AlcancesController::class, 'show'])->name('alcances.show');
    Route::get('/delete/{id}', [AlcancesController::class, 'delete'])->name('alcances.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [AlcancesController::class, 'store'])->name('alcances.store');
    Route::put('/update/{id}', [AlcancesController::class, 'update'])->name('alcances.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [AlcancesController::class, 'destroy'])->name('alcances.destroy');#estou passando parametro para o servidor
});

Route::prefix('especies') -> group(function(){

    Route::any('/index' , [EspeciesController::class,'index'])->name('especies.index');
    Route::get('/create', [EspeciesController::class, 'create'])->name('especies.create');
    Route::get('/edit/{id}', [EspeciesController::class, 'edit'])->name('especies.edit');
    Route::get('/show/{id}', [EspeciesController::class, 'show'])->name('especies.show');
    Route::get('/delete/{id}', [EspeciesController::class, 'delete'])->name('especies.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [EspeciesController::class, 'store'])->name('especies.store');
    Route::put('/update/{id}', [EspeciesController::class, 'update'])->name('especies.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [EspeciesController::class, 'destroy'])->name('especies.destroy');#estou passando parametro para o servidor
});
