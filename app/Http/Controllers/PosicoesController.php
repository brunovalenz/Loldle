<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosicoesFormRequest;
use Illuminate\Http\Request;
use App\Models\Posicoes;
use Exception;
use App\Service\PosicoesServiceInterface;

class PosicoesController extends Controller
{
    private $service;

    public function __construct(PosicoesServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;
        $registros = $this->service->index($pesquisar, $perPage);
        return view ('posicoes.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]);
    }

    public function create()
    {
        return view('posicoes.create');
    }

    public function store(PosicoesFormRequest $request)
    {
        
       $registro=$request->all();
        
        try{
            $data = $request->validated();
            $registro = $this->service->store($registro);
            return redirect()->route('posicoes.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('posicoes.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function show(string $id)
    {
        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('posicoes.show',['registro'=>$registro]);
        }catch(Exception $e){
            return view('posicoes.show',['registro'=>$registro,'fail'=>'Registro não localizado'.$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('posicoes.edit',['registro'=>$registro]);
        }catch(Exception $e){
            return view('posicoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PosicoesFormRequest $request, string $id)
    {
        
        $registro = null;
        $registro=$request->all();   
        try{
            $registro = $this->service->update($registro,$id);
            return redirect()->route('posicoes.index')->with('success','Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('posicoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function delete(string $id){

        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('posicoes.destroy',['registro'=>$registro]);
        }catch(Exception $e){
            return view('posicoes.destroy',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return redirect()->route('posicoes.index')->with('success','Registro excluido com sucesso!');
        }catch(Exception $e){
            return view('posicoes.destroy',['fail'=>$e->getMessage()]);
        }
    }
}