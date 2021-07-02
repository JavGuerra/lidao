<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Pruebas extends Component
{

    public $texto;
    public $cuenta = 1;

    public function hacer()
    {
        $this->cuenta++;
    }

    public function render()
    {
        return view('livewire.pruebas');
    }
}
