<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New book') }}"></x-title>
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('books.store')">
            <x-slot name="title">
                {{ __('Create book') }}
            </x-slot>

            <x-slot name="description">
                {{ __('New book') }}
                @include('books.background-image', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">

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