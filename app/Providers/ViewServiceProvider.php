<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Registrar servicios.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Servicios.
     *
     * @return void
     */
    public function boot()
    {
        // Compositores que aportan información a las vistas
        View::composer('navigation-menu', 'App\Http\View\Composers\NavigationMenuComposer');
        View::composer('users/index', 'App\Http\View\Composers\RoleProfileComposer');
        View::composer('*', 'App\Http\View\Composers\StatusProfileComposer');
        View::composer(['users/index', 'livewire/profile/update-locale-form'], 'App\Http\View\Composers\LocaleProfileComposer');
    }
}
