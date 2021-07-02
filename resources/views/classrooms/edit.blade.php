<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ Str::limit($classroom->name, 64) }}"></x-title>
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('classrooms.update', $classroom)" method="PUT">
            <x-slot name="title">
                {{ __('Edit classroom') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update the name, the section, the teacher and write annotations if required.') }}
                @include('images.classrooms', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4 grid gap-6">
                    <!-- Nombre -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $classroom->name) }}" required="required" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Sección -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="section_id" value="{{ __('Section') }}" />
                        <x-jet-input id="section_id" name="section_id" class="mt-1 block w-full" type="number" step="1" min="1" value="{{ old('section_id', $classroom->section_id) }}" required="required" />
                        <x-jet-input-error for="section_id" class="mt-2" />
                    </div>

                    <!-- Profesor -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="teacher_id" value="{{ __('Teacher') }}" />
                        <x-select name="teacher_id" class="mt-1 block w-full" :options="teachers()" :objId="$classroom->teacher_id" />
                        <x-jet-input-error for="teacher_id" class="mt-2" />
                    </div>

                    <!-- Anotaciones -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="annotation" value="{{ __('Annotations') }}" />
                        <x-textarea id="annotation" name="annotation" type="text" class="mt-1 block w-full" rows="3">
                            {{ old('annotation', $classroom->annotation) }}
                        </x-textarea>
                        <x-jet-input-error for="annotation" class="mt-2" />
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2 sm:pl-6">
                    <a href="{{ route('classrooms.show', $classroom) }}" class="block mt-2 sm:mt-8 text-xs text-gray-400 hover:text-gray-300 active:text-gray-400 disabled:opacity-25 transition">

                        <svg xmlns="http://www.w3.org/2000/svg" id="info" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-labelledby="infoTitle infoDesc" role="button">
                            <title id="infoTitle">{{__('More information...')}}</title>
                            <desc id="infoDesc">{{__('Information icon with letter i.')}}</desc>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>

        </x-form-section>

        <div class="mt-10 sm:mt-0">
            <x-jet-section-border />
        </div>
        <div class="mt-10 sm:mt-0">
            <livewire:edit-classroom-form action="delete" :classroomId="$classroom->id" :title="__('Delete classroom')" :desc="__('Permanently delete the classroom.')" :text="__('Once the classroom is deleted, all of it relationated data will be permanently deleted. Before deleting the classroom, please download any data or information that you wish to retain.')" :confirmTxt="__('Are you sure you want to delete the classroom? Once the classroom is deleted, all of it relationated data will be permanently deleted. Before deleting the classroom, please download any data or information that you wish to retain.')" />
        </div>

    </x-main>
</x-app-layout>