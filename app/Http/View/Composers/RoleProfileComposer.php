<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class RoleProfileComposer
{

    /**
     * Vincular datos a la vista.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de roles de usuario a las vistas
        $roles = ['0' => 'Student', '1' => 'Admin', '2' => 'Teacher'];
        $view->with('roles', $roles);
    }
}