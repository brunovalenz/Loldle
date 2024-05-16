<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $table = "recursos";

    protected $fillable = [
        'recurso'
    ];

    protected $hiden =[
        'creat_at',
        'updated_at'
    ];

    public function rules(){

        return[
            'recurso'=>'required'
        ];
    }

    public function feedback(){
        return[
            'recurso'=>'O campo :attribute é obrigatório er informado!'
        ];
    }
}
