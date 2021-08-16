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
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard', 'role' => 0],
            ['href' => 'schoolyears.index', 'name' => 'schoolyears.*', 'text' => 'School years', 'role' => 0],
            ['href' => 'sections.index', 'name' => 'sections.*', 'text' => 'Sections', 'role' => 0],
            ['href' => 'enrollments.index', 'name' => 'enrollments.*', 'text' => 'Enrollments', 'role' => 0],
            ['href' => 'users.index', 'name' => 'users.*', 'text' => 'Users', 'role' => 0],
            ['href' => 'books.index', 'name' => 'books.*', 'text' => 'Books', 'role' => 0],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard', 'role' => 1],
            ['href' => 'mysections.index', 'name' => 'mysections.*', 'text' => 'Sections', 'role' => 1],
            ['href' => 'students.index', 'name' => 'students.*', 'text' => 'Students', 'role' => 1],
            ['href' => 'library.index', 'name' => 'library.*', 'text' => 'Library', 'role' => 1],
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard', 'role' => 2],
            ['href' => 'readings.index', 'name' => 'readings.*', 'text' => 'Readings', 'role' => 2],
            ['href' => 'library.index', 'name' => 'library.*', 'text' => 'Library', 'role' => 2],
        ];
        $view->with('navLinks', $navLinks);
    }
}
