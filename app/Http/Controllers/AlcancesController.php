<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlcancesFormRequests;
use Illuminate\Http\Request;
use App\Models\Alcances;
use Exception;
use App\Service\AlcancesServiceInterface;

class AlcancesController extends Controller
{

    private $service;

    public function __construct(AlcancesServiceInterface $service)
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
        return view ('alcances.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]); //retorna os conteudo para determinado local
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando o controller autor controler - create');
        return view('alcances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlcancesFormRequests $request)
    {
        
       $registro=$request->all();
        
        try{
            $data = $request->validated();
            $registro = $this->service->store($registro);
            return redirect()->route('alcances.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('alcances.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
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
            return view('alcances.show',['registro'=>$registro]);
        }catch(Exception $e){
            return view('alcances.show',['registro'=>$registro,'fail'=>'Registro não localizado'.$e->getMessage()]);
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
            return view('alcances.edit',['registro'=>$registro]);
        }catch(Exception $e){
            return view('alcances.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlcancesFormRequests $request, string $id)
    {
        
        $registro = null;
        $registro=$request->all();   
        try{
            $registro = $this->service->update($registro,$id);
            return redirect()->route('alcances.index')->with('success','Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('alcances.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function delete(string $id){

        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('alcances.destroy',['registro'=>$registro]);
        }catch(Exception $e){
            return view('alcances.destroy',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return redirect()->route('alcances.index')->with('success','Registro excluido com sucesso!');
        }catch(Exception $e){
            return view('alcances.destroy',['fail'=>$e->getMessage()]);
        }
    }
}