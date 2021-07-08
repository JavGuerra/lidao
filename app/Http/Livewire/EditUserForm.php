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
