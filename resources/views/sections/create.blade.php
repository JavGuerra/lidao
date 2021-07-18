<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New section') }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('sections.store')">
            <x-slot name="title">
                {{ __('Create section') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Enter the name, the level and write annotations if required.') }}
                @include('images.sections', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input autofocus="autofocus" id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required="required" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Etapa y nivel -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="stagelevel_id" value="{{ __('Level') }}" />
                    <x-select id="stagelevel_id" name="stagelevel_id" class="mt-1 block w-full" :options="$stagelevels" />
                    <x-jet-input-error for="stagelevel_id" class="mt-2" />
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