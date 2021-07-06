<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class StageLevelComposer
{

    /**
     * Vincular datos a la vista.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Pasa la lista de niveles educativos
        $stagelevels = collect([
            (object) [ 'id' =>  '1', 'name' => 'First cycle: 1st Primary (6-7 years)', 'short' => '1st Primary'],
            (object) [ 'id' =>  '2', 'name' => 'First cycle: 2nd Primary (7-8 years)', 'short' => '2nd Primary']
        ]);

        $view->with('stagelevels', $stagelevels);
    }
}