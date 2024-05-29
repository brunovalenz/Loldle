<?php

namespace App\Service;

use App\Models\Campeoes_Posicoes;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class Campeoes_PosicoesService implements Campeoes_PosicoesServiceInterface{

    private $repository;
    public function __construct(Campeoes_Posicoes $campeoes_posicoes){#Lembrando que não temos o nosso model Alcances! Ainda temos que criar!
        $this->repository = $campeoes_posicoes;
    }

    public function index($pesquisar, $perPage){
        
        $registros = $this->repository->with('campeao', 'posicao')->where(function($query) use ($pesquisar){

            if($pesquisar){
                $query->where("nome","like","%".$pesquisar."%");
            }
        })->paginate($perPage);
        return $registros;
        
        #Aqui, ele pega a minha tabela e exibe na tela os valores dessa tabela!
    }

    public function store($request){#repository é o model a tabela nossa!
        DB::beginTransaction();
        try{
            
            $registro=$this->repository->create($request);
            DB::commit();
            return $registro;
        }catch(Exception $e){
            dd($e->getMessage());
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
        //dd('passando pelo ervico de update');
        $campeaoCadastrado = $this->repository->find($id);
        

        DB::beginTransaction();
        try{
            $registro=$campeaoCadastrado->update($request);
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