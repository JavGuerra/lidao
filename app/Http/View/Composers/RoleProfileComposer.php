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
        $roles = collect([
            (object) [ 'id' =>  '0', 'name' => 'Admin'],
            (object) [ 'id' =>  '1', 'name' => 'Teacher'],
            (object) [ 'id' =>  '2', 'name' => 'Student'],
        ]);

        $view->with('roles', $roles);
    }
}