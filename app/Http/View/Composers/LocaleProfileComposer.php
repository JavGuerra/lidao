<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\App;

class LocaleProfileComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de idiomas soportados a las vistas
        $languages = ['en' => 'english', 'es' => 'español'];
        $view->with('languages', $languages);
    }
}