<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Years extends Component
{
    public $startYear;
    public $endYear;
    public $editing = false;

    public function mount()
    {
        if (isset($this->startYear)) {
            $this->endYear = $this->startYear + 1;
            $this->editing = true;
        } elseif (old('start_at')) {
            $this->startYear = old('start_at');
            $this->endYear = $this->startYear + 1;
        }
    }

    public function plusOne()
    {
        if ($this->startYear != null) {
            $this->endYear = $this->startYear + 1;
        } else {
            $this->endYear = '';
        }
        return $this->endYear;
    }

    public function render()
    {
        return <<<'blade'
                <div class="col-span-6 sm:col-span-4">
                    <div class="flex justify-between">
                        <div class="mr-3 col-span-3 sm:col-span-2 w-full">
                            <x-jet-label for="start_at" value="{{ __('Start year') }}" />
                            <input id="start_at" name="start_at"
                                wire:model="startYear" wire:change="plusOne()"
                                class="mt-1 block w-full disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                type="number" value="{{ $startYear }}" placeholder="{{__('yyyy')}}"
                                min="{{ $editing ? '1901' : startYear() }}" max="2154"
                                step="1" maxlength="4"  pattern="\d{4}"
                                {{ $editing ? 'disabled=disabled' : 'required=required' }}
                            />
                        </div>

                        <div class="ml-3 col-span-3 sm:col-span-2 w-full">
                            <x-jet-label for="end_at" value="{{ __('Ending year') }}" />
                            <x-jet-input id="end_at" name="end_at" class="mt-1 block w-full disabled:opacity-50" type="number" value="{{ $endYear }}" placeholder="{{__('yyyy')}}" disabled="disabled" />
                        </div>

                        <div class="sm:col-span-2 sm:w-full"></div>
                    </div>
                    <x-jet-input-error for="start_at" class="mt-2" />
                </div>
        blade;
    }
}
