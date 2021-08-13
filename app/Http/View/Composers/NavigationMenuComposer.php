<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class NavigationMenuComposer
{
    /**
     * Vincular datos a la vista.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de enlaces del menú a las vistas
        $navLinks = [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            ['href' => 'schoolyears.index', 'name' => 'schoolyears.*', 'text' => 'School years'],
            ['href' => 'sections.index', 'name' => 'sections.*', 'text' => 'Sections'],
            ['href' => 'enrollments.index', 'name' => 'enrollments.*', 'text' => 'Enrollments'],
            ['href' => 'users.index', 'name' => 'users.*', 'text' => 'Users'],
            ['href' => 'books.index', 'name' => 'books.*', 'text' => 'Books'],
        ];
        $view->with('navLinks', $navLinks);
    }
}
