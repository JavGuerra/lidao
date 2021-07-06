<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cookie;
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

    public function render()
    {
        return view('livewire.cookie-announcement');
    }
}
