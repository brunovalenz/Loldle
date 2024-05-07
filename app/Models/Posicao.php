<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posicao extends Model
{
    use HasFactory;

    protected $table = "posicoes";

    protected $fillable = [
        'posicao'
    ];

    public function rules(){

        return[
            'posicao'=>'required'
        ];
    }

    public function feedback(){
        return[
            'posicao'=>'O campo :attribute é obrigatório er informado!'
        ];
    }
}
