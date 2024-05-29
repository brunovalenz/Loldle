<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeoes_Posicoes extends Model
{
    use HasFactory;

    protected $table = "campeoes_posicoes";

    protected $fillable = [

        'campeoes_idcampeoes',
        'posicoes_idposicoes',
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

    public function campeao()
    {
        return $this->belongsTo(Campeoes::class, 'campeoes_idcampeoes');
    }

    public function posicao()
    {
        return $this->belongsTo(Posicoes::class, 'posicoes_idposicoes');
    }
}
