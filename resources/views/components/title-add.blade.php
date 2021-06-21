<div class="flex justify-between items-center h-8">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
    </h2>
    {{ $slot }}
    <div>
        <a href="{{ $link ?? '' }}" class="inline-flex items-center ml-2 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
            <!-- <x-jet-secondary-button class="ml-2" type="button" x-on:click.prevent="{{ $link ?? '' }}"> -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            {{ __('Add') }}
            <!-- </x-jet-secondary-button> -->
        </a>
    </div>
</div>