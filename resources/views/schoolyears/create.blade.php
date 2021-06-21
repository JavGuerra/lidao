<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New school year') }}"></x-title>
    </x-slot>
    <x-main>

        <x-form-section submit="">
            <x-slot name="title">
                {{ __('Create school year') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Enter the name, a brief description and the start and end dates of the school year.') }}
                @include('schoolyears.background-image', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" require="require" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Descripción -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-textarea id="description" type="text" class="mt-1 block w-full" rows="3" />
                    <x-jet-input-error for="description" class="mt-2" />
                </div>

                <!-- Fechas -->
                <div class="col-span-6 sm:col-span-4">
                    <div class="flex justify-between">
                        <div>
                            <x-jet-label for="startDate" value="{{ __('Start date') }}" />
                            <x-jet-input id="startDate" type="date" class="mt-1 block w-full" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{2}" />
                            <x-jet-input-error for="startDate" class="mt-2" />
                        </div>

                        <div class="ml-3">
                            <x-jet-label for="endDate" value="{{ __('End date') }}" />
                            <x-jet-input id="endDate" type="date" class="mt-1 block w-full" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{2}" />
                            <x-jet-input-error for="endDate" class="mt-2" />
                        </div>

                        <div class="sm:w-1/3"></div>
                    </div>
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