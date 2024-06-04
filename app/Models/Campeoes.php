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
            'imagem' => '|image|mimes:jpeg,png,jpg,gif|max:8192',
            'genero' => 'required|string|max:255',
            'ano' => 'required|integer',
            'recursos_idrecursos' => 'required|integer',
            'alcances_idalcances' => 'required|integer',
        ];
    }

    public function feedback(){
        return[
            'nome' => 'O campo :attribute é obrigatório ser informado!',
            'imagem' => 'A :attribute é muito grande!',
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

    public function posicoes()
    {
        return $this->belongsToMany(Campeoes_Posicoes::class, 'campeoes_posicoes', 'campeoes_idcampeoes', 'posicoes_idposicoes');	
    }
    
    public function especies()
    {
        return $this->belongsToMany(Especies_Campeoes::class,'especies_campeoes', 'campeoes_idcampeoes', 'especies_idespecies');
    }

    public function regioes()
    {
        //return $this->belongsToMany(Regioes_Campeoes::class);
    }
}