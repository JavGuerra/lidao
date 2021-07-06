<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Pruebas extends Component
{

    public $texto;
    public $cuenta = 1;
    public $numero;
    public $valor;

    public function suma()
    {
        $this->valor = $this->numero;
        return $this->valor++;
    }

    public function hacer()
    {
        return $this->cuenta++;
    }

    public function render()
    {
        return view('livewire.pruebas');
    }
}
