<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegiaoFormRequest;
use App\Models\Regiao;
use Exception;
use App\Service\RegiaoServiceInterface;
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
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;
       // dd('acessando o controller autor controler - index');// mostrar uma mensagem 
       //$registros = Autor::paginate(10);#crie uma variável
       $registros = $this->service->index($pesquisar, $perPage);
       //dd($registros);
        return view ('regiao.index', ['registros' => $registros, 'perPage' => $perPage, 'filter'=>$pesquisar]);
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

        $registro=$request->all();
        
        try{
            $data = $request->validated();
            $registro = $this->service->store($registro);
            return redirect()->route('regiao.index')->with('success','Registro cadastrado com sucesso!');
        }catch(Exception $e){
            return view('regiao.create',['registro'=>$registro,'fail'=>$e->getMessage()]);
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
            return view('regiao.show',['registro'=>$registro]);
        }catch(Exception $e){
            return view('regiao.show',['registro'=>$registro,'fail'=>'Registro não localizado'.$e->getMessage()]);
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
            return view('regiao.edit',['registro'=>$registro]);
        }catch(Exception $e){
            return view('regiao.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegiaoFormRequest $request, string $id)
    {
    
        $registro = null;
        $registro=$request->all();   
        try{
            $registro = $this->service->update($registro,$id);
            return redirect()->route('regiao.index')->with('success','Registro alterado com sucesso!');
        }catch(Exception $e){
            return view('regiao.edit',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }

    }

    public function delete(string $id){
        $registro = null;
        try{
            $registro = $this->service->show($id);
            return view('regiao.destroy',['registro'=>$registro]);
        }catch(Exception $e){
            return view('regiao.destroy',['registro'=>$registro,'fail'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return redirect()->route('regiao.index')->with('success','Registro excluido com sucesso!');
        }catch(Exception $e){
            return view('regiao.destroy',['fail'=>$e->getMessage()]);
        }
    }
}
