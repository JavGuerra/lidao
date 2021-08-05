<x-jet-form-section submit="updateLocale">
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
            <select wire:model.defer="lang" name="locale" class="mt-1 block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>