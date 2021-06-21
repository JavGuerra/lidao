<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class NavigationMenuComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de enlaces del menú a las vistas
        $navLinks = [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard', 'rol' => [0, 1, 2]],
            ['href' => 'schoolyears.index', 'name' => 'schoolyears.*', 'text' => 'School years', 'rol' => 1],
            ['href' => 'classrooms.index', 'name' => 'classrooms.*', 'text' => 'Classrooms', 'rol' => [0, 1, 2]],
            ['href' => 'users.index', 'name' => 'users.*', 'text' => 'Users', 'rol' => 1],
            //['href' => 'users.index', 'name' => 'users.*', 'text' => 'Students', 'rol' => 2],
            ['href' => 'books.index', 'name' => 'books.*', 'text' => 'Books', 'rol' => [0, 1, 2]],
        ];
        $view->with('navLinks', $navLinks);
    }
}