<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateLocaleForm extends Component
{
    public $lang;
    public $langSelected;

    public function mount()
    {
        $this->langSelected = getLang();
        $this->lang = $this->langSelected;
    }

    /**
     * Cambia el idioma
     *
     * @return mixed
     */
    public function updateLocale()
    {
        setLang($this->lang);
        $this->langSelected = $this->lang;

        $this->emit('saved');

        // TODO actualizar página con AJAX
        // $this->emit('refresh-navigation-menu');
        return redirect()->route('profile.show');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.update-locale-form');
    }
}
