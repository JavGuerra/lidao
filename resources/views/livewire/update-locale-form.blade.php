<x-form-section submit="updateLocale" prevent="true">
    <x-slot name="title">
        {{ __('Choose Language') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Select the language in which the application will be displayed.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Language -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="locale" value="{{ __('Language') }}" />
            <select wire:model.defer="lang" name="locale" class="mt-1 block w-1/2 text-gray-800 dark:text-gray-200 bg-white dark:bg-black border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach($languages as $key => $language)
                <option value="{{$key}}">{{$language}}</option>
                @endforeach()
            </select>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-form-section>