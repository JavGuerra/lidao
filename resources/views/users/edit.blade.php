<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ Str::limit($user->name, 64) }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route ('users.update', $user)" method="PUT">
            <x-slot name="title">
                {{ __('Edit user') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update the name and the rest of the user data.') }}
                @include('images.users', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">

                <div class="col-span-6 sm:col-span-4 grid gap-6">
                    <!-- Nombre -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $user->name) }}" required="required" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Correo electrónico -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $user->email) }}" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" name="password" type="password" class="mt-1 block w-full" value="{{ old('password') }}" />
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>

                    <!-- TODO Siguientes campos... -->
                    <span class="mt-1 block">...</span>

                </div>

                <div class="col-span-6 sm:col-span-2 sm:mt-6 sm:pl-6">
                    <x-jet-label for="status" value="{{ __('Status') }} " />
                    @if($user->status)
                    <span id="status" class="mt-1 px-2 inline text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        {{ __( $status[true] ) }}
                    </span>
                    @else
                    <span id="status" class="mt-1 px-2 inline text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                        {{ __( $status[false] ) }}
                    </span>
                    @endif
                    <a href="{{ route('users.show', $user) }}" class="block mt-2 sm:mt-8 text-xs text-gray-400 hover:text-gray-300 active:text-gray-400 disabled:opacity-25 transition">
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
            <livewire:edit-user-form action="delete" :userId="$user->id" :title="__('Delete user')" :desc="__('Permanently delete the user.')" :text="__('Once the user is deleted, all of it relationated data will be permanently deleted. Before deleting the user, please download any data or information that you wish to retain.')" :confirmTxt="__('Are you sure you want to delete the user? Once the user is deleted, all of it relationated data will be permanently deleted. Before deleting the user, please download any data or information that you wish to retain.')" />
        </div>

    </x-main>
</x-app-layout>