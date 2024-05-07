<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LocalSistema extends Component
{
    public $mensagemPrimaria;
    public $mensagemSecundaria;
    public $url;
    public $navegacao;

    public function __construct($mensagemPrimaria, $mensagemSecundaria, $url, $navegacao)
    {
        $this->mensagemPrimaria = $mensagemPrimaria;
        $this->mensagemSecundaria = $mensagemSecundaria;
        $this->url = $url;
        $this->navegacao = $navegacao;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.local-sistema');
    }
}
