<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regiao extends Model
{
    use HasFactory;

    protected $table = "regioes";

    protected $fillable = [
        'regiao'
    ];

    public function rules(){

        return[
            'regiao'=>'required'
        ];
    }

    public function feedback(){
        return[
            'regiao'=>'O campo :attribute é obrigatório er informado!'
        ];
    }
}
