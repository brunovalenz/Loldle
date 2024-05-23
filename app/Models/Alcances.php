<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcances extends Model
{
    use HasFactory;

    protected $table = "alcances";

    protected $fillable = [
        'alcance'
    ];

    protected $hiden =[
        'creat_at',
        'updated_at'
    ];


    public function rules(){

        return[
            'alcance'=>'required'
        ];
    }

    public function feedback(){
        return[
            'alcance'=>'O campo :attribute é obrigatório ser informado!'
        ];
    }

}
