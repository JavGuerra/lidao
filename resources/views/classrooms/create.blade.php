<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New classroom') }}"></x-title>
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('classrooms.store')">
            <x-slot name="title">
                {{ __('Create classroom') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Enter the name, the section, the teacher and write annotations if required.') }}
                @include('images.classrooms', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <!-- Nombre -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required="required" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Sección -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="section_id" value="{{ __('Section') }}" />
                    <x-jet-input id="section_id" name="section_id" class="mt-1 block w-full" type="number" step="1" min="1" value="{{ old('section_id') }}" required="required" />
                    <x-jet-input-error for="section_id" class="mt-2" />
                </div>

                <!-- Profesor -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="teacher_id" value="{{ __('Teacher') }}" />
                    <x-jet-input id="teacher_id" name="teacher_id"  class="mt-1 block w-full" type="number" step="1" min="1" value="{{ old('teacher_id') }}" required="required" />
                    <x-jet-input-error for="teacher_id" class="mt-2" />
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