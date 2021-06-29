<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Schoolyear;

class ShowSchoolyearModal extends Component
{
    /**
     * Indica si la acción a realizar está confirmada.
     *
     * @var bool
     */
    public $confirming = false;


    /**
     * Variables con el contenido para la ventana modal.
     *
     * @var string
     */
    public $title;


    /**
     * El curso actual.
     *
     * @var object
     */
    public $schoolyearId;
    public $schoolyear;


    public function mount($schoolyearId)
    {
        $this->schoolyear = Schoolyear::find($this->schoolyearId);
    }

    /**
     * Renderiza el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.show-schoolyear-modal');
    }
}
