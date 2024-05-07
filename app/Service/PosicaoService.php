<?php

namespace App\Services;

use App\Models\Posicao;
use App\Services\PosicaoServiceInterface;
use Illuminate\Http\Request;


class PosicaoService implements PosicaoServiceInterface{

    private $repository;

    public function __construct(Posicao $posicao){
        $this->repository = $posicao;
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
        
        $posicaoCadastrado = $this->repository->find($id);
        $posicaoCadastrado->update($request->all());
    }

    public function destroy($id){
        $posicaoCadastrado = $this->repository->find($id);
        $posicaoCadastrado->delete();
    }


}