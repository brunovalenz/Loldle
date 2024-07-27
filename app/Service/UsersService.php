<?php

namespace App\Service;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UsersService implements UsersServiceInterface{

    private $repository;

    public function __construct(User $regiao){
        $this->repository = $regiao;
    }
    

    public function index($pesquisar, $perPage){
        $registros = $this->repository->where(function($query) use ($pesquisar){

            if($pesquisar){
                $query->where("posicao","like","%".$pesquisar."%");
            }
        })->paginate($perPage);
        return $registros;
    }

    //salvar
    public function store($request){
        
        DB::beginTransaction();
        try{
            
            $registro=$this->repository->create($request);
            DB::commit();
            return $registro;
        }catch(Exception $e){
            //dd($e->getMessage());
            DB::rollBack();
            return new Exception('Erro ao criar o registro'.$e->getMessage());
            
        }
    }

    public function show(string $id){
        try{
            $registro = $this->repository->findOrfail($id);
            return $registro;
        }catch(ModelNotFoundException $e){
            throw new Exception('Registro não localizado!');
        }
    }

    public function update($request, string $id){
        $posicaoCadastrado = $this->repository->find($id);
        
        DB::beginTransaction();
        try{
            $registro=$posicaoCadastrado->update($request);
            DB::commit();
            return $registro;
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao alterar o registro'.$e->getMessage());
        }
    }


    public function destroy(string $id){
        $posicaoCadastrado = $this->show($id);
        
        DB::beginTransaction();
        try{
            $posicaoCadastrado->delete();
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao excluir o registro'.$e->getMessage());
        }
    }
}