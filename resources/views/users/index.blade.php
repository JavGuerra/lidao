<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ __('Users') }}" :link="route('users.create')" />
  </x-slot>
  <x-main>
    
    @if ($users->count())

    <livewire:users-index />

    @else

    <div class="mt-3 py-10 flex justify-center">
      @include('images.users')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no users to show') }}</div>

    @endif

  </x-main>
</x-app-layout>