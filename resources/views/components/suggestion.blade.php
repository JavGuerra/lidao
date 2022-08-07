<div class="flex max-w-full sm:mx-auto mb-10 p-6 bg-yellow-100 dark:bg-indigo-900 rounded-md border-t-4 sm:border-t-0 sm:border-l-4 border-yellow-300 dark:border-indigo-500 shadow-lg">
    <div class="inline-flex w-24 px-6">
        @include('images.idea')
    </div>
    <div class="w-full">
        <span class="text-yellow-500 font-bold text-lg">
            {{__('Suggestion')}}
        </span>
        <br />
        <span class="text-gray-600 dark:text-gray-300">
            {{ $slot }}
        </span>
    </div>
</div>