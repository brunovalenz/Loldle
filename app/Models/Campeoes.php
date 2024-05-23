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

    protected $hidden =[
        'created_at',
        'updated_at',
    ];

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genero' => 'required|string|max:255',
            'ano' => 'required|integer',
            'recursos_idrecursos' => 'required|integer',
            'alcances_idalcances' => 'required|integer',
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

    
    public function alcance()
    {
        return $this->belongsTo(Alcances::class, 'alcances_idalcances');
    }

    public function recurso()
    {
        return $this->belongsTo(Recursos::class, 'recursos_idrecursos');
    }
}
