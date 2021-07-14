<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;

class EditUserForm extends Component
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
     * El id de la clase actual.
     *
     * @var int
     */
    public $userId;


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
     * Activa el usuario seleccionado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function active(Request $request)
    {
        $this->resetErrorBag();

        // // Desactiva el curso activo (si lo hubiera) y registra la fecha y hora de desactivación
        // if (thereIsAnActiveSchoolyear()) {
        //     $schoolyearSelected = activeSchoolyear();
        //     $schoolyearSelected->update([
        //         'closed_at' => now(),
        //     ]);
        // }
        // // Obtiene el curso
        // $schoolyear = theSchoolyear($this->schoolyearId);
        // // Activa el curso actual
        // activateSchoolYear($schoolyear->id);

        $request->session()->flash('flash.banner', __('The user is now active.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('users.edit', $user);
    }

    /**
     * Desactiva el usuario seleccionado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deactive(Request $request)
    {
        $this->resetErrorBag();

        // // Obtiene el curso
        // $schoolyear = theSchoolyear($this->schoolyearId);
        
        // // Desactiva el curso
        // deactivateSchoolYear();

        // // Registra la fecha y hora de desactivación
        // $schoolyear->update([
        //     'closed_at' => now(),
        // ]);

        $request->session()->flash('flash.banner', __('The user is now inactive.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('users.edit', $user);
    }


    /**
     * Borra la clase.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->resetErrorBag();

        // Borrando de la clase...
        if ($this->userId) {
            User::find($this->userId)->delete();
            // y lanzando el aviso
            $request->session()->flash('flash.banner', __('The user has been definitively eliminated.'));
            $request->session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('users.index');
    }

    /**
     * Renderiza el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.edit-user-form');
    }
}
