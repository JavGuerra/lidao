<x-jet-form-section submit="updateLocale">
    <x-slot name="title">
        {{ __('Choose Language') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Select the language in which the application will be displayed.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Language -->
        @php
        $language_selected = $languages[App::getLocale()];
        @endphp
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="locale" value="{{ __('Language') }}" />
            <x-jet-dropdown id="locale" align="left" width="60">
                <x-slot name="trigger">
                    <button type="button" class="mt-1 inline-flex items-center px-3 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                        {{ $language_selected }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <div class="w-60">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Select another language') }}
                        </div>
                    </div>
                    @foreach($languages as $language)
                    @if ($language != $language_selected)
                    <x-jet-dropdown-link wire:click.prevent="$set('language_selected', $language)" href="{{ $language }}">
                        {{ $language }}
                    </x-jet-dropdown-link>
                    @endif
                    @endforeach
                </x-slot>
            </x-jet-dropdown>
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
