<?php

namespace App\Service;

use App\Models\Alcances;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AlcancesService implements AlcancesServiceInterface{

    private $repository;

    public function __construct(Alcances $alcances){#Lembrando que não temos o nosso model Alcances! Ainda temos que criar!
        $this->repository = $alcances;
    }

    public function index($pesquisar, $perPage){
        $registros = $this->repository->where(function($query) use ($pesquisar){

            if($pesquisar){
                $query->where("alcance","like","%".$pesquisar."%");
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
        //dd('passando pelo ervico de update');
        $alcanceCadastrado = $this->repository->find($id);
        

        DB::beginTransaction();
        try{
            $registro=$alcanceCadastrado->update($request);
            DB::commit();
            return $registro;
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao alterar o registro'.$e->getMessage());
        }
    }


    public function destroy(string $id){
        $alcanceCadastrado = $this->show($id);
        

        DB::beginTransaction();
        try{
            $alcanceCadastrado->delete();
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return new Exception('Erro ao excluir o registro'.$e->getMessage());
        }
    }
}