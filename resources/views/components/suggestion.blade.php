<div class="flex max-w-full sm:mx-auto mb-10 p-6 bg-yellow-50 rounded-md border-t-4 sm:border-t-0 sm:border-l-4 border-yellow-400 shadow-lg">
    <div class="inline-flex w-24 px-6">
        @include('images.idea')
    </div>
    <div class="w-full">
        <span class="text-yellow-500 font-bold text-lg">
            {{__('Suggestion')}}
        </span>
        <br />
        <span class="text-gray-500">
            {{ $slot }}
        </span>
    </div>
</div>