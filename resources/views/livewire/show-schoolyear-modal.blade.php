<div>
    <!-- Ventana modal para confirmación -->
    <x-jet-dialog-modal wire:model="confirming" maxWidth="sm">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">

            <!-- Ficha -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                <div class="flex justify-between border-b border-gray-200">
                    <div class="px-4 py-4 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ __('School year information') }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            {{ __('Details of the school year.') }}
                        </p>
                    </div>
                    <div>
                        <div class="px-4 py-4 sm:px-6">
                            <a href="{{ route('schoolyears.edit', $schoolyear) }}" class="inline-flex items-center ml-2 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                {{ __('Edit') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-6">

                    <!-- Columna izquierda -->
                    <div class="sm:col-span-4 sm:border-r border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ __('Name') }}
                                </dt>
                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-3">
                                    {{ $schoolyear->name }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-4 grid grid-cols-2 gap-4 sm:px-6">
                                <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Start')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                                        {{ $schoolyear->start_at }}
                                    </dd>
                                </div>
                                <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('End')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                                        {{ $schoolyear->end_at }}
                                    </dd>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-4 grid grid-cols-2 gap-4 sm:px-6">
                                <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Number of classrooms') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                                        {{ numClassrooms($schoolyear->id) }}
                                    </dd>
                                </div>
                                <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{__('Number of students')}}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                                        0
                                    </dd>
                                </div>
                            </div>
                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{__('Created by')}}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                                    {{ user_name($schoolyear->creator_id) }}
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{__('Annotations')}}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                                    {{ $schoolyear->annotation }}
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Columna derecha -->
                    <div class="sm:col-span-2">
                        <dl>
                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                                    {{__('Status')}}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    @if($schoolyear->selected)
                                    <span id="status" class="mt-1 px-2 inline text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ __( $status[true] ) }}
                                    </span>
                                    @else
                                    <span id="status" class="mt-1 px-2 inline text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                        {{ __( $status[false] ) }}
                                    </span>
                                    @endif
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                                    {{__('Created')}}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ \Carbon\Carbon::parse($schoolyear->created_at)->format('d M Y H:i') }}
                                </dd>
                            </div>
                            @if($schoolyear->updated_at != null && $schoolyear->updated_at != $schoolyear->created_at)
                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                                    {{__('Updated')}}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ \Carbon\Carbon::parse($schoolyear->updated_at)->format('d M Y H:i') }}
                                </dd>
                            </div>
                            @endif
                            @if($schoolyear->closed_at != null && ! $schoolyear->selected)
                            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                                    {{__('Closed')}}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ \Carbon\Carbon::parse($schoolyear->closed_at)->format('d M Y H:i') }}
                                </dd>
                            </div>
                            @endif
                        </dl>
                    </div>

                </div>

                <div class="py-2 sm:border-t sm:border-gray-200"></div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirming')" wire:loading.attr="disabled">
                {{ __('OK') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>