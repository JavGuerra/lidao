<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\Schoolyear;

class EditSchoolyearForm extends Component
{
    /**
     * Indicates if school year $action is being confirmed.
     *
     * @var bool
     */
    public $confirming = false;

    /**
     * The modal's action.
     *
     * @var string
     */
    public $action = '';

    /**
     * The modal content.
     *
     * @var string
     */
    public $title;
    public $desc;
    public $text;
    public $confirmTxt;

    /**
     * The user's current password.
     *
     * @var string
     */
    public $password = '';

    /**
     * The schoolyear's current id.
     *
     * @var int
     */
    public $schoolyearId;

    /**
     * Confirm the school year action.
     *
     * @return void
     */
    public function confirm()
    {
        $this->resetErrorBag();

        if ($this->action == "delete") {

            $this->password = '';

            $this->dispatchBrowserEvent('confirming-delete-schoolyear');
        }

        $this->confirming = true;
    }

    /**
     * Activate the current school year.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function active(Request $request)
    {
        $this->resetErrorBag();

        // Desactiva el curso activo y registra la fecha y hora
        $schoolyearSelected = Schoolyear::where('selected', 1)->first();
        if ($schoolyearSelected) {
            $schoolyearSelected->update([
                'selected' => 0,
                'closed_at' => now(),
            ]);
        }
        // Activa el curso actual
        $schoolyear = Schoolyear::find($this->schoolyearId);
        $schoolyear->update(['selected' => 1]);

        $request->session()->flash('flash.banner', __('The course has been activated.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.edit', $schoolyear);
    }

    /**
     * Deactivate the current school year.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deactive(Request $request)
    {
        $this->resetErrorBag();

        // Desactiva el curso actual y registra la fecha y hora
        $schoolyear = Schoolyear::find($this->schoolyearId);
        $schoolyear->update([
            'selected' => 0,
            'closed_at' => now(),
        ]);

        $request->session()->flash('flash.banner', __('The course has been deactivated.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.edit', $schoolyear);
    }

    /**
     * Delete the current school year.
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
            Schoolyear::find($this->schoolyearId)->delete();
            // y lanzando el aviso
            $request->session()->flash('flash.banner', __('The school year has been definitively eliminated.'));
            $request->session()->flash('flash.bannerStyle', 'success');
        }

        return redirect()->route('schoolyears.index');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.edit-schoolyear-form');
    }
}
