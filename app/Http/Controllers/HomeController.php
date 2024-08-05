<?php

namespace App\Http\Controllers;
use App\Models\Campeoes;

class HomeController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()#mostrar os dados do nosso autor
    {
        $campeoes = Campeoes::inRandomOrder()->with('alcance','recurso', 'posicoes')->first();
        return view ('home.index', compact('campeoes')); //retorna os conteudo para determinado local
    }
}