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
            (object) ['id' =>  '0', 'name' => userRole(0)],
            (object) ['id' =>  '1', 'name' => userRole(1)],
            (object) ['id' =>  '2', 'name' => userRole(2)],
        ]);

        $view->with('roles', $roles);
    }
}
