<?php

namespace App\Service;

use App\Model\Campeoes;
use Illuminate\Http\Request;

interface CampeoesServiceInterface extends ServiceInterface{

    public function attach($posicoes, $especies, $regioes);

    public function sync($id, $posicoes, $especies, $regioes);
}