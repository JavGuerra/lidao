<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ __('Books') }}" :link="route('books.create')" />
  </x-slot>
  <x-main>

    <x-nada-que-mostrar img="images.books" msg="There are no books to show" />
    
  </x-main>
</x-app-layout>