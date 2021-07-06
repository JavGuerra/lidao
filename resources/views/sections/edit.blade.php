<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ Str::limit($section->name, 64) }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('sections.update', $section)" method="PUT">
            <x-slot name="title">
                {{ __('Edit section') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update the name, the level and write annotations if required.') }}
                @include('images.sections', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4 grid gap-6">
                    <!-- Nombre -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $section->name) }}" required="required" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Etapa y nivel -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="stagelevel_id" value="{{ __('Level') }}" />
                        <x-select id="stagelevel_id" name="stagelevel_id" class="mt-1 block w-full" :options="$stagelevels" :objId="$section->id" />
                        <x-jet-input-error for="stagelevel_id" class="mt-2" />
                    </div>

                    <!-- Anotaciones -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="annotation" value="{{ __('Annotations') }}" />
                        <x-textarea id="annotation" name="annotation" type="text" class="mt-1 block w-full" rows="3">
                            {{ old('annotation', $section->annotation) }}
                        </x-textarea>
                        <x-jet-input-error for="annotation" class="mt-2" />
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-2 sm:pl-6">
                    <a href="{{ route('sections.show', $section) }}" class="block mt-2 sm:mt-8 text-xs text-gray-400 hover:text-gray-300 active:text-gray-400 disabled:opacity-25 transition">

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
            <livewire:edit-section-form action="delete" :sectionId="$section->id" :title="__('Delete section')" :desc="__('Permanently delete the section.')" :text="__('Once the section is deleted, all of it relationated data will be permanently deleted. Before deleting the section, please download any data or information that you wish to retain.')" :confirmTxt="__('Are you sure you want to delete the section? Once the section is deleted, all of it relationated data will be permanently deleted. Before deleting the section, please download any data or information that you wish to retain.')" />
        </div>

    </x-main>
</x-app-layout>