<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New school year') }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('schoolyears.store')">
            <x-slot name="title">
                {{ __('Create school year') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Enter the name, the start and end years of the school year and write notes if required.') }}
                @include('images.schoolyears', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">

                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required="required" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Fechas -->
                <div class="col-span-6 sm:col-span-4">

                    <!-- Véase comillas em x-data. Si old está vacío se inicializa con '' -->
                    <div x-data="{ year: parseInt('{{ old('start_at') }}') }" class="flex justify-between gap-6">
                       
                        <div class="col-span-3 sm:col-span-2 w-full">
                            <x-jet-label for="start_at" value="{{ __('Start year') }}" />
                            <input id="start_at" name="start_at" x-model.number="year"
                                class="mt-1 block w-full disabled:opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                type="number" placeholder="{{__('yyyy')}}"
                                min="{{ startYear() }}" max="2154" step="1" maxlength="4"  pattern="\d{4}"
                            />
                        </div>

                        <!-- Importante usar parseInt() para summa correcta del valor de old que se entrega como string -->
                        <div class="col-span-3 sm:col-span-2 w-full">
                            <x-jet-label for="end_at" value="{{ __('Ending year') }}" />
                            <x-jet-input id="end_at" name="end_at" class="mt-1 block w-full disabled:opacity-50" type="text" x-bind:value="year ? year + 1 : ''" placeholder="{{__('yyyy')}}" disabled="disabled" />
                        </div>

                        <div class="sm:col-span-2 sm:w-full"></div>
                    </div>
                    <x-jet-input-error for="start_at" class="mt-2" />
                </div>


                <!-- Anotaciones -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="annotation" value="{{ __('Annotations') }}" />
                    <x-textarea id="annotation" name="annotation" type="text" class="mt-1 block w-full" rows="3">
                        {{ old('annotation') }}
                    </x-textarea>
                    <x-jet-input-error for="annotation" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>

        </x-form-section>

    </x-main>
</x-app-layout>