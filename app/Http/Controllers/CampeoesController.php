<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alcances;
use App\Models\Recursos;
use App\Http\Requests\CampeoesFormRequest;
use App\Service\CampeoesServiceInterface;
use Exception;
use Illuminate\Http\Request;

use App\Models\Campeoes;

class CampeoesController extends Controller
{
    private $service;

    public function __construct(CampeoesServiceInterface $service)
    {
        $this->service = $service;
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)#mostrar os dados do nosso autor
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;
        
       // dd('acessando o controller autor controler - index');// mostrar uma mensagem 
       //$registros = Autor::paginate(10);#crie uma variável
       $registros = $this->service->index($pesquisar, $perPage);
       //dd($registros);
       
        return view ('campeoes.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]); //retorna os conteudo para determinado local
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando o controller autor controler - create');
        
        $alcances = Alcances::all(); // Busca todos os alcances
        $recursos = Recursos::all();
        return view('campeoes.create', compact('alcances'), compact('recursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampeoesFormRequest $request)
    {

        $registro=$request->all();
        
        try{
            $data = $request->validated();

            // Processa a imagem
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $imageData = file_get_contents($request->file('imagem')->getRealPath());
                $data['imagem'] = $imageData;
            }

            $this->service->store($data);
            return redirect()->route('campeoes.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('campeoes.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registro = null;
        $alcances = Alcances::all();
        $recursos = Recursos::all();
        try{
            $registro = $this->service->show($id);
            return view('campeoes.edit', ['registro'=>$registro], compact('alcances', 'recursos'));
        }catch(Exception $e){
            return view('campeoes.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CampeoesFormRequest $request, string $id)
    {
        $registro=$request->all();

        try{

            $data = $request->validated();

            // Processa a imagem
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $imageData = file_get_contents($request->file('imagem')->getRealPath());
                $data['imagem'] = $imageData;
            }

            $this->service->update($data,$id);
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

    /**
     * Remove the specified resource from storage.
     */
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
