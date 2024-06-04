<?php

namespace App\Service;

use App\Models\Especies_Campeoes;
use Exception;
use Illuminate\Support\Facades\DB;

class Especies_CampeoesService implements Especies_CampeoesServiceInterface{

    private $repository;
    public function __construct(Especies_Campeoes $especies_campeoes){
        $this->repository = $especies_campeoes;
    }

    public function index($pesquisar, $perPage){
        
        $registros = $this->repository->with('campeao', 'especie')->where(function($query) use ($pesquisar){

            if($pesquisar){
                $query->where("nome","like","%".$pesquisar."%");
            }
        })->paginate($perPage);
        
        return $registros;
    }

    public function store($request){
        DB::beginTransaction();
        try{
            $registro=$this->repository->create($request);
            DB::commit();

            return $registro;
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao criar o registro'.$e->getMessage()); 
        }
    }

    public function show(string $id){
        try{
            $registro = $this->repository->findOrfail($id);

            return $registro;
        }catch(Exception $e){
            throw new Exception('Registro não localizado!');
        }
    }

    public function update($request, string $id){

        $campeaoCadastrado = $this->repository->find($id);
        DB::beginTransaction();

        try{
            $registro = $campeaoCadastrado->update($request);
            DB::commit();

            return $registro;
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao alterar o registro'.$e->getMessage());
        }
    }


    public function destroy(string $id){
        $campeaoCadastrado = $this->show($id);
        

        DB::beginTransaction();
        try{
            $campeaoCadastrado->delete();
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao excluir o registro'.$e->getMessage());
        }
    }
}