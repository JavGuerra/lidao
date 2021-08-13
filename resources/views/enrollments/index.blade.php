<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ __('Enrollments') }}" :link="numSectionsActiveSchoolyear() ? route('enrollments.create'): ''" />
  </x-slot>
  <x-main>

    <div class="mt-3 py-10 flex justify-center">
      @include('images.enrollments')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no enrollments to show') }}</div>
    
  </x-main>
</x-app-layout>