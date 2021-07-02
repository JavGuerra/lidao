<div>

    {{$texto}}
    <select wire:model="texto" name="seleccion">
    <option>Nombre1</option>
    <option>Nombre2</option>
    <option>Nombre3</option>
    </select>

    {{$cuenta}}
    <x-jet-button class="ml-2" wire:click="hacer" wire:loading.attr="disabled">
        hacer
    </x-jet-button>

@php
    $languages = ['en' => 'english', 'es' => 'español'];
@endphp

    @foreach($languages as $key => $value)
    [̣̣{{$key}},{{$value}}], 
    @endforeach

</div>