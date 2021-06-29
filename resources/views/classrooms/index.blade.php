<x-app-layout>
  <x-slot name="header">
    <x-title-add title="{{ __('Classrooms') }}" :link="route('classrooms.create')"></x-title-add>
  </x-slot>
  <x-main>

    <div class="mt-3 py-10 flex justify-center">
      @include('images.classrooms')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no classrooms to show') }}</div>

  </x-main>
</x-app-layout>