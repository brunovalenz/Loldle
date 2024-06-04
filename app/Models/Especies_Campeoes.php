<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especies_Campeoes extends Model
{
    use HasFactory;

    protected $table = "especies_campeoes";

    protected $fillable = [
        'especies_idespecies',
        'campeoes_idcampeoes',
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];

    public function rules()
    {
        return [
            'campeoes_idcampeoes' => 'required|integer',
            'posicoes_idposicoes' => 'required|integer',
        ];
    }

    public function feedback(){
        return[
            'campeoes_idcampeoes' => 'O campo :attribute é obrigatório ser informado!',
            'posicoes_idposicoes' => 'O campo :attribute é obrigatório ser informado!',
        ];
    }

}
