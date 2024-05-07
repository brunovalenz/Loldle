<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalSistema extends Component
{
    public $mensagem;
    public $url;
    public $id;
    public $metodo;

    public function __construct($mensagem, $url, $id, $metodo)
    {
        $this->mensagem = $mensagem;
        $this->url = $url;
        $this->id = $id;
        $this->metodo = $metodo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-sistema');
    }
}
