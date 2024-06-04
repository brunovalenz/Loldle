<?php

use App\Http\Controllers\CampeoesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcancesController;
use App\Http\Controllers\RegioesController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\Campeoes_PosicoesController;
use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\PosicoesController;
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

Route::prefix('regioes') -> group(function(){

    Route::any('/index' , [RegioesController::class,'index'])->name('regioes.index');
    Route::get('/create', [RegioesController::class, 'create'])->name('regioes.create');
    Route::get('/edit/{id}', [RegioesController::class, 'edit'])->name('regioes.edit');
    Route::get('/show/{id}', [RegioesController::class, 'show'])->name('regioes.show');
    Route::get('/delete/{id}', [RegioesController::class, 'delete'])->name('regioes.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [RegioesController::class, 'store'])->name('regioes.store');
    Route::put('/update/{id}', [RegioesController::class, 'update'])->name('regioes.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [RegioesController::class, 'destroy'])->name('regioes.destroy');#estou passando parametro para o servidor
});

Route::prefix('recurso') -> group(function(){

    Route::any('/index' , [RecursosController::class,'index'])->name('recurso.index');
    Route::get('/create', [RecursosController::class, 'create'])->name('recurso.create');
    Route::get('/edit/{id}', [RecursosController::class, 'edit'])->name('recurso.edit');
    Route::get('/show/{id}', [RecursosController::class, 'show'])->name('recurso.show');
    Route::get('/delete/{id}', [RecursosController::class, 'delete'])->name('recurso.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [RecursosController::class, 'store'])->name('recurso.store');
    Route::put('/update/{id}', [RecursosController::class, 'update'])->name('recurso.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [RecursosController::class, 'destroy'])->name('recurso.destroy');#estou passando parametro para o servidor
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

Route::prefix('campeoes') -> group(function(){

    Route::any('/index' , [CampeoesController::class,'index'])->name('campeoes.index');
    Route::get('/create', [CampeoesController::class, 'create'])->name('campeoes.create');
    Route::get('/edit/{id}', [CampeoesController::class, 'edit'])->name('campeoes.edit');
    Route::get('/show/{id}', [CampeoesController::class, 'show'])->name('campeoes.show');
    Route::get('/delete/{id}', [CampeoesController::class, 'delete'])->name('campeoes.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [CampeoesController::class, 'store'])->name('campeoes.store');
    Route::put('/update/{id}', [CampeoesController::class, 'update'])->name('campeoes.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [CampeoesController::class, 'destroy'])->name('campeoes.destroy');#estou passando parametro para o servidor
});

Route::prefix('posicoes') -> group(function(){

    Route::any('/index' , [PosicoesController::class,'index'])->name('posicoes.index');
    Route::get('/create', [PosicoesController::class, 'create'])->name('posicoes.create');
    Route::get('/edit/{id}', [PosicoesController::class, 'edit'])->name('posicoes.edit');
    Route::get('/show/{id}', [PosicoesController::class, 'show'])->name('posicoes.show');
    Route::get('/delete/{id}', [PosicoesController::class, 'delete'])->name('posicoes.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [PosicoesController::class, 'store'])->name('posicoes.store');
    Route::put('/update/{id}', [PosicoesController::class, 'update'])->name('posicoes.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [PosicoesController::class, 'destroy'])->name('posicoes.destroy');#estou passando parametro para o servidor
});

Route::prefix('campeoes_posicoes') -> group(function(){

    Route::any('/index' , [Campeoes_PosicoesController::class,'index'])->name('campeoes_posicoes.index');
    Route::get('/create', [Campeoes_PosicoesController::class, 'create'])->name('campeoes_posicoes.create');
    Route::get('/edit/{id}', [Campeoes_PosicoesController::class, 'edit'])->name('campeoes_posicoes.edit');
    Route::get('/show/{id}', [Campeoes_PosicoesController::class, 'show'])->name('campeoes_posicoes.show');
    Route::get('/delete/{id}', [Campeoes_PosicoesController::class, 'delete'])->name('campeoes_posicoes.delete');#estou passando parametro para o servidor
    
    Route::post('/store', [Campeoes_PosicoesController::class, 'store'])->name('campeoes_posicoes.store');
    Route::put('/update/{id}', [Campeoes_PosicoesController::class, 'update'])->name('campeoes_posicoes.update');#o id é chave primeira da tabela para identifcar quem estou modificando
    Route::delete('/destroy/{id}', [Campeoes_PosicoesController::class, 'destroy'])->name('campeoes_posicoes.destroy');#estou passando parametro para o servidor
});