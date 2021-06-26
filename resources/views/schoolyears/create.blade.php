<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New school year') }}"></x-title>
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('schoolyears.store')">
            <x-slot name="title">
                {{ __('Create school year') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Enter the name, the start and end years of the school year and write notes if required.') }}
                @include('schoolyears.background-image', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required="required" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Fechas -->
                <div class="col-span-6 sm:col-span-4">
                    <div class="flex justify-between">
                        <div>
                            <x-jet-label for="start_at" value="{{ __('Start year') }}" />
                            <x-jet-input id="start_at" name="start_at" class="mt-1 block w-full" type="number" step="1" min="1901" max="2155" maxlength="4" value="{{ old('start_at') }}" required="required" placeholder="{{__('yyyy')}}" pattern="\d{4}" />
                        </div>

                        <div class="ml-4">
                            <x-jet-label for="end_at" value="{{ __('Ending year') }}" />
                            <x-jet-input id="end_at" name="end_at" class="mt-1 block w-full" type="number" step="1" min="1901" max="2155" maxlength="4" value="{{ old('end_at') }}" required="required" placeholder="{{__('yyyy')}}" pattern="\d{4}" />
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
                        {{ old('annotation') }}
                    </x-textarea>
                    <x-jet-input-error for="annotation" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>

        </x-form-section>

    </x-main>
</x-app-layout>