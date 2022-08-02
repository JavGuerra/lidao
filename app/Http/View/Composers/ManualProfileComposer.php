<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ManualProfileComposer
{

    /**
     * Vincular datos a la vista.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de enlaces del manual de usuario a las vistas
        $manuals = collect([
            (object) ['id' =>  '0', 'url' => getConfig('adminDoc')],
            (object) ['id' =>  '1', 'url' => getConfig('teacherDoc')],
            (object) ['id' =>  '2', 'url' => getConfig('studentDoc')],
        ]);

        //$view->with('manuals', $manuals);
        $view->with('urlManual', $manuals[Auth::user()->role]->url);
    }
}
