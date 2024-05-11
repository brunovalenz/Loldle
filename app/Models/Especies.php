<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{
    use HasFactory;

    protected $table = "especies";

    protected $fillable = [
        'especie'
    ];

    protected $hiden =[
        'creat_at',
        'updated_at'
    ];


    public function rules(){

        return[
            'especie'=>'required'
        ];
    }

    public function feedback(){
        return[
            'especie'=>'O campo :attribute é obrigatório ser informado!'
        ];
    }
}
