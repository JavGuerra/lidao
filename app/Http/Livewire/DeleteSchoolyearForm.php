<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\Schoolyear;

class DeleteSchoolyearForm extends Component
{
    /**
     * Indicates if school year deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingSchoolyearDeletion = false;

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
    public $schoolyear_id;

    /**
     * Confirm that the school year would like to delete their account.
     *
     * @return void
     */
    public function confirmSchoolyearDeletion()
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatchBrowserEvent('confirming-delete-schoolyear');

        $this->confirmingSchoolyearDeletion = true;
    }

    /**
     * Delete the current school year.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function deleteSchoolyear(Request $request)
    {
        $this->resetErrorBag();

        // Comprobando la contraseña...
        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        // Borrando el curso...
        if ($this->schoolyear_id) {
            $record = Schoolyear::where('id', $this->schoolyear_id);
            $record->delete();
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
        return view('livewire.delete-schoolyear-form');
    }
}
