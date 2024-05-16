<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeoes extends Model
{
    use HasFactory;

    protected $table = "campeoes";

    protected $fillable = [
        'nome',
        'imagem',
        'genero',
        'ano',
        'recursos_idrecursos',
        'alcances_idalcances',
    ];

    protected $hiden =[
        'creat_at',
        'updated_at',
    ];

    public function rules(){

        return[
            'nome' => 'required',
            'imagem' => 'required',
            'genero' => 'required',
            'ano' => 'required',
            'recursos_idrecursos' => 'required',
            'alcances_idalcances' => 'required',
        ];
    }

    public function feedback(){
        return[
            'nome' => 'O campo :attribute é obrigatório ser informado!',
            'imagem' => 'O campo :attribute é obrigatório ser informado!',
            'genero' => 'O campo :attribute é obrigatório ser informado!',
            'ano' => 'O campo :attribute é obrigatório ser informado!',
            'recursos_idrecursos' => 'O campo :attribute é obrigatório ser informado!',
            'alcances_idalcances' => 'O campo :attribute é obrigatório ser informado!',
        ];
    }
}
