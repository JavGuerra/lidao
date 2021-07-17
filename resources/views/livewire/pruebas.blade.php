@php
$roles = collect([
            (object) [ 'id' =>  '0', 'name' => 'Admin'],
            (object) [ 'id' =>  '1', 'name' => 'Teacher'],
            (object) [ 'id' =>  '2', 'name' => 'Student'],
        ]);
@endphp
                    <div class="col-span-6 sm:col-span-4 grid gap-6">
                        <div x-data="{role: ''}" class="lg:flex grid gap-6">
                            <!-- Rol -->
                            <div class="col-span-6 lg:col-span-2 w-full">
                                <x-jet-label for="role" value="{{ __('Role') }}" />
                                <x-select id="role" name="role" x-model="role" class="mt-1 block w-full" :options="$roles" />
                                <x-jet-input-error for="role" class="mt-2" />
                            </div>

                            <!-- NIA -->
                            <div class="col-span-6 lg:col-span-2 w-full">
                                <div x-show="role == 2"  x-transition>
                                    <x-jet-label for="nia" value="{{ __('Student identification number') }}" />
                                    <x-jet-input id="nia" name="nia" type="text" class="mt-1 block w-full" value="{{ old('nia') }}" required="required" minlength="7" />
                                    <x-jet-input-error for="nia" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>




<div>
{{$texto}}
    <select wire:model="texto" name="seleccion">
    <option>Nombre1</option>
    <option>Nombre2</option>
    <option>Nombre3</option>
    </select>

    {{$valor}}
    <input type="text" wire:model="numero" wire:keydown.enter.tab="suma" />

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


    <br>
    <br>
    
    <!-- Alpine.js -->

    <div x-data="{year: ''}">
    <input type="number" name="year" x-model.number="year" @change.keyup="$refs.nextYear.setAttribute('value', year ? year + 1 : '')" min="1901" max="2154" maxlength="4" step="1" placeholder="yyyy"/>
    <input type="text" x-ref="nextYear" value="" placeholder="yyyy" disabled />
</div>

<div x-data="{year: {{ old('year', 0) }} }" x-init="year = (year == 0) ? '' : year">
    <input type="number" name="year" x-model.number="year" min="1901" max="2154" maxlength="4" step="1" placeholder="yyyy"/>
    <input type="text" x-bind:value="year ? year + 1 : ''" placeholder="yyyy" disabled />
</div>


<div x-data="{ year: {{old('year', '')}} }">
  <input type="number" name="year" x-model="year" min='1901' max='2059' placeholder='YYYY' />
  <div x-text="year ? parseInt(year) + 1 : '' "></div>
</div>

<!-- funciona -->
<div x-data="{year: parseInt('{{ old('year') }}') }">
    <input type="number" name="year" x-model.number="year" min="1901" max="2154" maxlength="4" step="1" placeholder="yyyy"/>
    <input type="text" x-bind:value="year ? year + 1 : ''" placeholder="yyyy" disabled />
</div>


<div x-data="{foo:false}" @click="foo =! foo">
   <div x-show="foo">Hide/Show me</div>
</div>


</div>

<br>
<br>







