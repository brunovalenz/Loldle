<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alcances;
use App\Models\Recursos;
use App\Models\Posicoes;
use App\Models\Campeoes;
use App\Models\Especies;
use App\Models\Regioes;
use App\Http\Requests\CampeoesFormRequest;
use App\Service\CampeoesServiceInterface;
use Exception;
use Illuminate\Http\Request;


class CampeoesController extends Controller
{
    private $service;

    public function __construct(CampeoesServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;

       $registros = $this->service->index($pesquisar, $perPage);

        return view ('campeoes.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]);
    }

    public function create()
    {
        
        $alcances = Alcances::all();
        $recursos = Recursos::all();
        $posicoes = Posicoes::all();
        $especies = Especies::all();
        $regioes = Regioes::all();
        return view('campeoes.create', compact('alcances', 'recursos', 'posicoes', 'especies', 'regioes'));
    }

    public function store(CampeoesFormRequest $request)
    {
        $registro=$request->all();
        
        try{
            $data = $request->validated();

            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $imageData = file_get_contents($request->file('imagem')->getRealPath());
                $data['imagem'] = $imageData;
            }

            $this->service->store($data);
            $this->service->attach($registro['posicoes'], $registro['especies'], $registro['regioes']);

            return redirect()->route('campeoes.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('campeoes.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function show(string $id)
    {
        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('campeoes.show',['registro'=>$registro]);
        }catch(Exception $e){
            return view('campeoes.show',['registro'=>$registro,'fail'=>'Registro não localizado'.$e->getMessage()]);
        }
    }

    public function edit(string $id)
    {
        $registro = null;
        $alcances = Alcances::all();
        $recursos = Recursos::all();
        $posicoes = Posicoes::all();
        $especies = Especies::all();
        $regioes = Regioes::all();
        try{
            $registro = $this->service->show($id);
            return view('campeoes.edit', ['registro'=>$registro], compact('alcances', 'recursos', 'posicoes', 'especies', 'regioes'));
        }catch(Exception $e){
            return view('campeoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    public function update(CampeoesFormRequest $request, string $id)
    {
        $registro=$request->all();

        try{

            $data = $request->validated();

            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $imageData = file_get_contents($request->file('imagem')->getRealPath());
                $data['imagem'] = $imageData;
            }

            $this->service->update($data,$id);
            $this->service->sync($id, $registro['posicoes'], $registro['especies'], $registro['regioes']);

            return redirect()->route('campeoes.index')->with('success','Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('campeoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function delete(string $id){

        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('campeoes.destroy',['registro'=>$registro]);
        }catch(Exception $e){
            return view('campeoes.destroy',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return redirect()->route('campeoes.index')->with('success','Registro excluido com sucesso!');
        }catch(Exception $e){
            return view('campeoes.destroy',['fail'=>$e->getMessage()]);
        }
    }
}
