<?php

namespace App\Service;

use App\Models\Regioes;
use Exception;
use Illuminate\Support\Facades\DB;

class RegioesService implements RegioesServiceInterface{

    private $repository;

    public function __construct(Regioes $regiao){
        $this->repository = $regiao;
    }

    public function index($pesquisar, $perPage){
        $registros = $this->repository->where(function($query) use ($pesquisar){

            if($pesquisar){
                $query->where("regiao","like","%".$pesquisar."%");
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

    public function show($id){
        try{
            $registro = $this->repository->findOrfail($id);
            return $registro;
        }catch(Exception $e){
            throw new Exception('Registro não localizado!');
        }
    }


    public function update($request, string $id){
        //dd('passando pelo ervico de update');
        $regiaoCadastrado = $this->repository->find($id);
        

        DB::beginTransaction();
        try{
            $registro=$regiaoCadastrado->update($request);
            DB::commit();
            return $registro;
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao alterar o registro'.$e->getMessage());
        }
    }

    public function destroy($id){
        $regiaoCadastrado = $this->show($id);
        

        DB::beginTransaction();
        try{
            $regiaoCadastrado->delete();
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao excluir o registro'.$e->getMessage());
        }
    }


}