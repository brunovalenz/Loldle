<?php

namespace App\Services;

use App\Models\Regiao;
use App\Services\RegiaorServiceInterface;
use Illuminate\Http\Request;


class RegiaoService implements RegiaoServiceInterface{

    private $repository;

    public function __construct(Regiao $regiao){
        $this->repository = $regiao;
    }

    public function index(){
        $registros = $this->repository->paginate(5);
        return(["registros"=>$registros]);
    }
    
    //salvar
    public function store($request){
        #validar o campo antes de efetivamente criar
        

        $this->repository->create($request->all());
    }

    public function show($id){
        $registro = $this->repository->find($id);
        return (["registro"=>$registro]);
    }


    public function update($request, string $id){
        // $request ->validate([
        //     $this->repository->rules(),
        // ]);
        
        $regiaoCadastrado = $this->repository->find($id);
        $regiaoCadastrado->update($request->all());
    }

    public function destroy($id){
        $regiaoCadastrado = $this->repository->find($id);
        $regiaoCadastrado->delete();
    }


}