<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New school year') }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('schoolyears.store')">
            <x-slot name="title">
                {{ __('Create school year') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Enter the name, the start and end years of the school year and write notes if required.') }}
                @include('images.schoolyears', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required="required" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Fechas -->
                <livewire:years />

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