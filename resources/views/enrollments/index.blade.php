<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ __('Enrollments') }}" :link="numSectionsActiveSchoolyear() ? route('enrollments.create'): ''" />
  </x-slot>
  <x-main>

    <x-nada-que-mostrar img="images.enrollments" msg="There are no enrollments to show" />

  </x-main>
</x-app-layout>