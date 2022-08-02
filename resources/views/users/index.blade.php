<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ __('Users') }}" :link="route('users.create')" />
  </x-slot>
  <x-main>
    
    @if ($users->count())

    <livewire:users-index />

    @else

    <x-nada-que-mostrar img="images.users" msg="There are no users to show" />

    @endif

  </x-main>
</x-app-layout>