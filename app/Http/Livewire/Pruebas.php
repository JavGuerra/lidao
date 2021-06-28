<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Pruebas extends Component
{

    public $confirmando = false;
    public $titulo = "Titulo";
    public $texto = "Texto";
    public $boton = "Botón";
    public $hace;

    public function hace1 ()
    {
        $this->boton = "Hace 1";
    }

    public function hace2() {
        $this->boton = "Hace 2";
    }

    public function confirmar()
    {
        $this->resetErrorBag();

        $this->confirmando = true;
    }

    public function confirmado(Request $request)
    {
        $this->resetErrorBag();

        //

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.pruebas', [
            'titulo' => $this->titulo,
            'texto' => $this->texto,
            'boton' => $this->boton,
        ]);
    }
}
