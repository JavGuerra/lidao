<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ Str::limit($schoolyear->name, 64) }}"></x-title>
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('schoolyears.update', $schoolyear)" method="PUT">
            <x-slot name="title">
                {{ __('Edit school year') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update the name, the start and end years of the school year and modify the annotations if required.') }}
                @include('schoolyears.background-image', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4 grid gap-6">

                    <!-- Nombre -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $schoolyear->name) }}" required="required" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Fechas -->
                    <div class="col-span-6 sm:col-span-4">
                        <div class="flex justify-between">
                            <div>
                                <x-jet-label for="start_at" value="{{ __('Start year') }}" />
                                <x-jet-input id="start_at" name="start_at" class="mt-1 block w-full" type="number" step="1" min="1901" max="2155" maxlength="4" value="{{ old('start_at', $schoolyear->start_at) }}" required="required" placeholder="{{__('yyyy')}}" pattern="\d{4}" />
                            </div>

                            <div class="ml-4">
                                <x-jet-label for="end_at" value="{{ __('Ending year') }}" />
                                <x-jet-input id="end_at" name="end_at" class="mt-1 block w-full" type="number" step="1" min="1901" max="2155" maxlength="4" value="{{ old('end_at', $schoolyear->end_at) }}" required="required" placeholder="{{__('yyyy')}}" pattern="\d{4}" />
                            </div>

                            <div class="sm:w-1/4"></div>
                        </div>
                        <x-jet-input-error for="start_at" class="mt-2" />
                        <x-jet-input-error for="end_at" class="mt-2" />
                    </div>

                    <!-- Anotaciones -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="annotation" value="{{ __('Annotations') }}" />
                        <x-textarea id="annotation" name="annotation" type="text" class="mt-1 block w-full" rows="3">
                            {{ old('annotation', $schoolyear->annotation) }}
                        </x-textarea>
                        <x-jet-input-error for="annotation" class="mt-2" />
                    </div>

                </div>

                <div class="col-span-6 sm:col-span-2 sm:mt-6  sm:pl-6">
                    <x-jet-label for="status" value="{{ __('Status') }} " />
                    @if($schoolyear->selected)
                    <span id="status" class="mt-1 px-2 inline text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ __( $status[true] ) }}
                    </span>

                    <dfn title="{{ __('Active school years cannot be eliminated.') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 inline h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </dfn>

                    @else
                    <span id="status" class="mt-1 px-2 inline text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                        {{ __( $status[false] ) }}
                    </span>
                    @endif
                    <a href="{{ route('schoolyears.show', $schoolyear) }}" class="block mt-2 sm:mt-6 text-xs text-gray-400 hover:text-gray-300 active:text-gray-400 disabled:opacity-25 transition">

                        <svg xmlns="http://www.w3.org/2000/svg" id="info" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-labelledby="infoTitle infoDesc" role="button">
                            <title id="infoTitle">{{__('More information...')}}</title>
                            <desc id="infoDesc">{{__('Information icon with letter i.')}}</desc>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>

        </x-form-section>

        @if($schoolyear->selected)
        <div class="mt-10 sm:mt-0">
            <x-jet-section-border />
        </div>
        <livewire:edit-schoolyear-form 
            action="deactive"
            :schoolyearId="$schoolyear->id"
            :title="__('Deactivate school year')"
            :desc="__('Close the school year to conclude its operations.')"
            :text="__('Once the school year is deactivated, you will not be able to add classes or other resources, but you can reactivate it if you wish.')"
            :confirmTxt="__('Are you sure you want to activate the school year? Once the school year is deactivated, you will not be able to add classes or other resources, but you can reactivate it if you wish.')"
             />
        </div>
        @else
        <div class="mt-10 sm:mt-0">
            <x-jet-section-border />
        </div>
        <div class="mt-10 sm:mt-0">
            <livewire:edit-schoolyear-form 
            action="active"
            :schoolyearId="$schoolyear->id"
            :title="__('Activate school year')"
            :desc="__('Activate the school year to add resources.')"
            :text="__('Once the school year is activated, you will be able to add classrooms and other resources, but the activation of this course implies the closure of the active course if there is one.')"
            :confirmTxt="__('Are you sure you want to activate the school year? Once the school year is activated, you will be able to add classrooms and other resources, but the activation of this course implies the closure of the active course if there is one.')"
             />
        </div>
        <div class="mt-10 sm:mt-0">
            <x-jet-section-border />
        </div>
        <div class="mt-10 sm:mt-0">
            <livewire:edit-schoolyear-form 
            action="delete"
            :schoolyearId="$schoolyear->id"
            :title="__('Delete school year')"
            :desc="__('Permanently delete the school year.')"
            :text="__('Once the school year is deleted, all of its classrooms and relationated data will be permanently deleted. Before deleting the school year, please download any data or information that you wish to retain.')"
            :confirmTxt="__('Are you sure you want to delete the school year? Once the school year is deleted, all of its classrooms and relationated data will be permanently deleted. Before deleting the school year, please download any data or information that you wish to retain.')"
             />
        </div>
        @endif

    </x-main>
</x-app-layout>