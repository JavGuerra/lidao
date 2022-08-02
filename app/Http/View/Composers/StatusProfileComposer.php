<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class StatusProfileComposer
{

    /**
     * Vincular datos a la vista.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de estados soportados a las vistas
        $status = ['0' => 'Inactive', '1' => 'Active'];
        $view->with('status', $status);
    }
}
