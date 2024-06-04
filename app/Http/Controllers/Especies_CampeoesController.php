<?php

namespace App\Http\Controllers;

use App\Models\Campeoes;
use App\Models\Especies;
use App\Http\Requests\Especies_CampeoesFormRequest;
use App\Service\Especies_CampeoesServiceInterface;
use Exception;
use Illuminate\Http\Request;

class Especies_CampeoesController extends Controller
{
    private $service;

    public function __construct(Especies_CampeoesServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;
        
       $registros = $this->service->index($pesquisar, $perPage);

        return view ('especies_campeoes.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]);
    }

    public function create()
    {
        $campeoes = Campeoes::all();
        $posicoes = Especies::all();

        return view('especies_campeoes.create', compact('campeao', 'especie'));
    }

    public function store(Especies_CampeoesFormRequest $request)
    {
        try{
            $data = $request->validated();
            $registro = $this->service->store($data);
            
            return redirect()->route('especies_campeoes.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('especies_campeoes.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function show(string $id)
    {
        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('especies_campeoes.show',['registro'=>$registro]);
        }catch(Exception $e){
            return view('especies_campeoes.show',['registro'=>$registro,'fail'=>'Registro não localizado'.$e->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        $registro = null;
        $campeoes = Campeoes::all();
        $posicoes = Especies::all();
        try{
            $registro = $this->service->show($id);

            return view('especies_campeoes.edit', ['registro'=>$registro], compact('campeoes', 'especies'));
        }catch(Exception $e){
            return view('especies_campeoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    public function update(Especies_CampeoesFormRequest $request, string $id)
    {
        $registro = null;
        $registro= $request->all();
        try{
            $registro = $this->service->update($registro,$id);

            return redirect()->route('especies_campeoes.index')->with('success','Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('especies_campeoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }


    }

    public function delete(string $id){

        $registro = null;

        try{
            $registro = $this->service->show($id);

            return view('especies_campeoes.destroy',['registro'=>$registro]);
        }catch(Exception $e){
            return view('especies_campeoes.destroy',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);

            return redirect()->route('especies_campeoes.index')->with('success','Registro excluido com sucesso!');
        }catch(Exception $e){
            return view('especies_campeoes.destroy',['fail'=>$e->getMessage()]);
        }
    }
}
