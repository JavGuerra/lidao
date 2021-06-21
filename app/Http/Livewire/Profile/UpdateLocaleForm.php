<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class UpdateLocaleForm extends Component
{

    /**
     * Cambia el idioma
     *
     * @return mixed
     */
    public function updateLocale()
    {
        //
        
        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.profile.update-locale-form');
    }
}
