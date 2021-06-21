<x-app-layout>
  <x-slot name="header">
    <x-title-add title="{{ __('Books') }}" link="{{ route('books.create') }}"></x-title-add>
  </x-slot>
  <x-main-container>

    <div class="min-w-full bg-gray-50 border-b border-gray-200">
      <div class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        {{ __('Whoops!') }}
      </div>
    </div>

    <div class="mt-3 py-10 flex justify-center">
      @include('books.background-image')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no registered books') }}</div>
    
  </x-main-container>
</x-app-layout>