<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Models\User;


class UpdateLocaleForm extends Component
{
    // Valor del lenguaje actual y lenguaje seleccionado
    public $lang;
    public $langSelected;

    // Obtiene valor inicial del lenguaje
    public function mount()
    {
        $this->langSelected = App::getLocale();
        $this->lang = $this->langSelected;
    }

    /**
     * Cambia el idioma
     *
     * @return mixed
     */
    public function updateLocale()
    {
        // Si se ha producido cambio...
        if ($this->lang != $this->langSelected) {
            // Cambia valor del idioma seleccionado en el componente
            $this->langSelected = $this->lang;

            // Obtiene el usuario y actualiza el valor de su idioma
            $user = User::find(auth()->user()->id);
            $user->locale = $this->lang;
            $user->save();

            // Cambia el lenguaje en la aplicación y en la sesión
            App::setlocale($this->lang);
            session()->put('locale', $this->lang);

            // Recarga la página para aplicar los cambios de idioma
            $this->redirectRoute('profile.show');
        }
        // lanza evento de aviso para la vista del componente
        $this->emit('saved');
    }

    /**
     * Renderiza el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.update-locale-form');
    }
}
