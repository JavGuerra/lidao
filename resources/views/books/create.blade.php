<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New book') }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('books.store')">
            <x-slot name="title">
                {{ __('Create book') }}
            </x-slot>

            <x-slot name="description">
                {{ __('New book') }}
                @include('images.books', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                <!-- TODO ver si emplear procesos de alta del sistema. -->
                <p class="text-lg font-bold mb-2">En preparación...</p>
                    <p>Aún no se ha iniciado la programación de esta parte de la app.</p>
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