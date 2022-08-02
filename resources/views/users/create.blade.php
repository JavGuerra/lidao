<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('New users') }}" />
    </x-slot>
    <x-main>

        <x-form-section :submit="route('users.store')">
            <x-slot name="title">
                {{ __('Create user') }}
            </x-slot>

            <x-slot name="description">
                {{ __('New user') }}
                @include('images.users', ['attributes' => 'hidden md:flex w-11/12'])
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4 grid gap-6">

                    <!-- Nombre -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input autofocus="autofocus" id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required="required" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Correo electrónico -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email') }}" required="required" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" autocomplete="off" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="col-span-6 sm:col-span-4" x-data="{ show: true }">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <div class="relative">
                            <input id="password" name="password" :type="show ? 'password' : 'text'" value="{{ old('password') }}" class="mt-1 block w-full pr-10 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required="required" minlength="8" autocomplete="new-password" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <svg class="h-4 text-gray-400" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                    <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg>
                                <svg class="h-4 text-gray-400" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                    <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>

                    <!-- Rol y NIA -->
                    <div class="col-span-6 sm:col-span-4 grid gap-6">
                        <div x-data="{role: '{{old('role')}}'}" class="lg:flex grid gap-6">

                            <!-- Rol -->
                            <div class="col-span-6 lg:col-span-2 w-full">
                                <x-jet-label for="role" value="{{ __('Role') }}" />
                                <x-select id="role" name="role" x-model="role" class="mt-1 block w-full" :options="$roles" :selected="old('role')" />
                                <x-jet-input-error for="role" class="mt-2" />
                            </div>

                            <!-- NIA -->
                            <div class="col-span-6 lg:col-span-2 w-full">
                                <div x-show="role == 2" x-transition>
                                    <x-jet-label for="nia" value="{{ __('Student identification number') }}" />
                                    <x-jet-input x-bind:disabled="(role == 2) ? false : true" name="nia" type="text" value="{{ old('nia') }}" class="mt-1 block w-full" required="required" minlength="7" />
                                    <x-jet-input-error for="nia" class="mt-2" />
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>

        </x-form-section>

        <div class="mt-10 sm:mt-0">
            <x-section-border />
        </div>

        <x-form-section :submit="route('users.import')" method="post" enctype="multipart/form-data">
            <x-slot name="title">
                {{ __('Upload users') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Upload a batch of users through a file in one of the following file formats: csv, txt, xls, xlsx, ods, gnumeric and xml.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">

                    <!-- Dropzone -->
                    <x-jet-label for="file" value="{{ __('Choose File') }}" />
                    <div x-data="{ fileName: '' }" class="bg-white mt-1 w-full relative p-4 text-gray-400 border border-gray-300 rounded-md shadow-sm">
                        <div x-ref="dnd" class="relative text-gray-400 border-2 border-gray-200 border-dashed rounded cursor-pointer">
                            <input accept="*" type="file" name="file" title="" x-ref="file"
                            @change="fileName = $refs.file.files[0].name"
                            class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                            @dragover="$refs.dnd.classList.add('bg-gray-100')"
                            @dragleave="$refs.dnd.classList.remove('bg-gray-100')"
                            @drop="$refs.dnd.classList.remove('bg-gray-100')" />
                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                                </svg>
                                <p class="mt-1">{{__('Drag your file here or click in this area.')}}</p>
                                <p class="mt-2 text-gray-900" x-text="fileName"></p>
                            </div>
                        </div>
                    </div>
                    <x-jet-input-error for="file" class="mt-2" />

                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Import') }}
                </x-jet-button>
            </x-slot>
        </x-form-section>

    </x-main>
</x-app-layout>