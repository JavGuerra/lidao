<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EditSchoolyearForm extends Component
{
    /**
     * Indica si la acción a realizar está confirmada.
     *
     * @var bool
     */
    public $confirming = false;

    /**
     * Contiene la acción a realizar.
     *
     * @var string
     */
    public $action = '';

    /**
     * Variables con el contenido para la ventana modal.
     *
     * @var string
     */
    public $title;
    public $desc;
    public $text;
    public $confirmTxt;

    /**
     * La contraseña del usuario actual.
     *
     * @var string
     */
    public $password = '';

    /**
     * El id del curso actual.
     *
     * @var int
     */
    public $schoolyearId;

    /**
     * Confirma la acción.
     *
     * @return void
     */
    public function confirm()
    {
        $this->resetErrorBag();

        if ($this->action == "delete") {
            $this->password = '';
            $this->dispatchBrowserEvent('confirming-delete');
        }

        $this->confirming = true;
    }

    /**
     * Activa el curso escolar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function active(Request $request)
    {
        $this->resetErrorBag();

        // Desactiva el curso activo (si lo hubiera) y registra la fecha y hora de desactivación
        if (thereIsAnActiveSchoolyear()) {
            $schoolyearSelected = activeSchoolyear();
            $schoolyearSelected->update([
                'closed_at' => now(),
            ]);
        }
        // Obtiene el curso
        $schoolyear = theSchoolyear($this->schoolyearId);
        // Activa el curso actual
        activateSchoolYear($schoolyear->id);

        $request->session()->flash('flash.banner', __('The course has been activated.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.edit', $schoolyear);
    }

    /**
     * Desactiva el curso escolar actual.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deactive(Request $request)
    {
        $this->resetErrorBag();

        // Obtiene el curso
        $schoolyear = theSchoolyear($this->schoolyearId);
        
        // Desactiva el curso
        deactivateSchoolYear();

        // Registra la fecha y hora de desactivación
        $schoolyear->update([
            'closed_at' => now(),
        ]);

        $request->session()->flash('flash.banner', __('The course has been deactivated.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.edit', $schoolyear);
    }

    /**
     * Borra el curso escolar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->resetErrorBag();

        // Comprobando la contraseña...
        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        // Borrando el curso...
        if ($this->schoolyearId) {
            theSchoolyear($this->schoolyearId)->delete();

            $request->session()->flash('flash.banner', __('The school year has been definitively eliminated.'));
            $request->session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('schoolyears.index');
    }

    /**
     * Renderiza el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.edit-schoolyear-form');
    }
}
