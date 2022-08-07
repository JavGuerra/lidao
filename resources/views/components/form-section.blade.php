@props(['submit' => null, 'method' => 'post', 'enctype' => '', 'prevent' => false])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">

        @if ($prevent)

        <form wire:submit.prevent="{{ $submit }}">

        @else  

        <form action="{{ $submit }}" method="{{ strtolower($method) == 'get' ? 'get' : 'post'  }}" enctype="{{ $enctype }}">

            @if(strtolower($method) != 'get')
                @csrf
            @endif

            @if(in_array(strtolower($method), ['put', 'patch', 'delete']))
                @method(strtolower($method))
            @endif
            
        @endif

            <div class="px-4 py-5 bg-white dark:bg-black sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-900 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                {{ $actions }}
            </div>
            @endif
        </form>
    </div>
</div>