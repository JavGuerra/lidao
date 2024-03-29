<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use Livewire\Component;

class CookieAnnouncement extends Component
{

    public ?bool $bannerClicked = false;

    private string $cookieName = 'lidao_cookie_banner';


    public function mount()
    {
        $this->bannerClicked = (bool) request()->cookie($this->cookieName);
    }


    public function bannerClicked()
    {
        $this->bannerClicked = true;

        // params are name, value, expire
        Cookie::queue($this->cookieName, 1, 15);
    }

    /**
     * Renderiza el componente.
     *
     * @return \Illuminate\View\View 
     */
    public function render() : View
    {
        return view('livewire.cookie-announcement');
    }
}
