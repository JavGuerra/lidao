<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Nia extends Component
{
    public $roles;
    public $role;
    public $show;

    public function mount($roles)
    {
        $this->role = old('role');
        $this->change();    
    }

    public function change()
    {
        $this->role == "2" ? $this->show = true : $this->show = false;
    }

    public function render()
    {
        return <<<'blade'
                <div class="col-span-6 sm:col-span-4 grid gap-6">
                <div class="lg:flex grid gap-6">
                    <!-- Rol -->
                    <div class="col-span-6 lg:col-span-2 w-full">
                        <x-jet-label for="role" value="{{ __('Role') }}" />

                        <!-- TODO Usar view component y componente blade select -->
                        <select id="role" name="role" wire:model.defer="role" wire:change="change"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">{{__('Choose an option')}}</option>
                            <option value="0">{{__('Admin')}}</option>
                            <option value="1">{{__('Teacher')}}</option>
                            <option value="2">{{__('Student')}}</option>
                        </select>

                        <x-jet-input-error for="role" class="mt-2" />
                    </div>
                    <!-- NIA -->
                    <div class="col-span-6 lg:col-span-2 w-full">
                        @if($show)
                            <x-jet-label for="nia" value="{{ __('Student identification number') }}" />
                            <x-jet-input id="nia" name="nia" type="text" class="mt-1 block w-full" value="{{ old('nia') }}" required="required" minlength="7" />
                            <x-jet-input-error for="nia" class="mt-2" />
                        @endif
                    </div>
                </div>
            </div>
        blade;
    }
}
