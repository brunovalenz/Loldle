<?php

namespace App\Http\Controllers;

use App\Models\Campeoes;
use App\Models\Posicoes;
use App\Http\Requests\Campeoes_PosicoesFormRequest;
use App\Service\Campeoes_PosicoesServiceInterface;
use Exception;
use Illuminate\Http\Request;

class Campeoes_PosicoesController extends Controller
{
    private $service;

    public function __construct(Campeoes_PosicoesServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;

       $registros = $this->service->index($pesquisar, $perPage);
       
        return view ('campeoes_posicoes.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]);
    }

    public function create()
    {
        
        $campeoes = Campeoes::all();
        $posicoes = Posicoes::all();
        return view('campeoes_posicoes.create', compact('campeao','posicao'));
    }

    public function store(Campeoes_PosicoesFormRequest $request)
    {

        $registro=$request->all();

        try{
            $data = $request->validated();
            $registro = $this->service->store($registro);
            dd($request->all());
            return redirect()->route('campeoes_posicoes.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('campeoes_posicoes.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function show(string $id)
    {
        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('campeoes_posicoes.show',['registro'=>$registro]);
        }catch(Exception $e){
            return view('campeoes_posicoes.show',['registro'=>$registro,'fail'=>'Registro não localizado'.$e->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        $registro = null;
        $campeoes = Campeoes::all();
        $posicoes = Posicoes::all();
        try{
            $registro = $this->service->show($id);
            return view('campeoes_posicoes.edit', ['registro'=>$registro], compact('campeoes', 'posicoes'));
        }catch(Exception $e){
            return view('campeoes_posicoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    public function update(Campeoes_PosicoesFormRequest $request, string $id)
    {
        $registro = null;
        $registro=$request->all();   
        try{
            $registro = $this->service->update($registro,$id);
            return redirect()->route('campeoes_posicoes.index')->with('success','Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('campeoes_posicoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }


    }

    public function delete(string $id){

        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('campeoes_posicoes.destroy',['registro'=>$registro]);
        }catch(Exception $e){
            return view('campeoes_posicoes.destroy',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return redirect()->route('campeoes_posicoes.index')->with('success','Registro excluido com sucesso!');
        }catch(Exception $e){
            return view('campeoes_posicoes.destroy',['fail'=>$e->getMessage()]);
        }
    }
}
