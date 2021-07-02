<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\App;


class UpdateLocaleForm extends Component
{

    public $lang;

    /**
     * Cambia el idioma
     *
     * @return mixed
     */
    public function updateLocale()
    {
        //App::setlocale($this->lang);
        //session()->put('locale', $this->lang);
        
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
        return view('profile.update-locale-form');
    }
}
