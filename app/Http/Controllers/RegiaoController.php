<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegiaoFormRequest;
use App\Models\Regiao;
use App\Services\RegiaoServiceInterface;
use Illuminate\Http\Request;



class RegiaoController extends Controller
{
    // faça a injeção de dependência do context
    private $service;

    public function __construct(RegiaoServiceInterface $service)
    {
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('acessando o controller autor controller - index');

        //essa variavel service eu criei no construtor e atribui o valor do model
        $registros =  $this->service->index(10);
        //$registros = Autor::paginate(10);

        return view('regiao.index', [
            'registros'=> $registros['registros'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando controller - create');
        return view('regiao.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(RegiaoFormRequest $request){
        #validar o campo antes de efetivamente criar

        $this->service->store($request);
        return redirect()->route('regiao.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registro = $this->service->show($id);
        return view('regiao.show', [
            'registro' => $registro['registro'],
        ]);        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //complete a função de editar
        $registro = $this->service->show($id);

        //Validação para caso o registro não exista
        //if(!$registro){
          //  return redirect()->back();
        //}

        return view('regiao.edit', [
            'registro'=> $registro['registro'],
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegiaoFormRequest $request, string $id)
    {
    
        $this -> service -> update($request, $id);
        return redirect()->route('regiao.index');

    }

    public function delete(string $id){
        $registro = $this ->service -> show($id);

        return view('regiao.destroy', [
            'registro'=> $registro['registro'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this ->service -> destroy($id);
        return redirect()->route('regiao.index');
    }
}
