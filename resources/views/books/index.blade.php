<x-app-layout>
  <x-slot name="header">
    <x-title-add title="{{ __('Books') }}" :link="route('books.create')"></x-title-add>
  </x-slot>
  <x-main>

    <div class="mt-3 py-10 flex justify-center">
      @include('books.background-image')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no books to show') }}</div>
    
  </x-main>
</x-app-layout>