<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regioes extends Model
{
    use HasFactory;

    protected $table = "regioes";

    protected $fillable = [
        'regiao'
    ];

    protected $hiden =[
        'created_at',
        'updated_at'
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
