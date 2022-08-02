<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
     * El id del usuario actual.
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

        $user = User::find($this->userId);
        $user->update(['status' => true]);

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

        $user = User::find($this->userId);
        $user->update(['status' => false, 'deactivated_at' => \Carbon\Carbon::now()]);

        $request->session()->flash('flash.banner', __('The user is now inactive.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('users.edit', $user);
    }


    /**
     * Borra el usuario.
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

        // Borrando del usuario...
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
        return view('livewire.edit-confirm-form');
    }
}
