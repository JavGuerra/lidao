<div>

    @if($page > 1 && $page > ceil($users->total()/$perPage))

    <div class="mt-3 py-10 flex justify-center">
        @include('images.users')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no users to show') }}</div>

    @else

    <div class="bg-white dark:bg-black overflow-hidden shadow-lg sm:rounded-lg">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 px-4 py-3 sm:px-6 bg-gradient-to-t from-gray-50 dark:from-gray-900">
                    <div class="flex col-span-1 lg:col-span-3 gap-4">
                        <div class="relative w-full">
                            <x-jet-input wire:model.debounce.500ms="search" autofocus="autofocus" name="search" id="search" class="w-full px-10 rounded-md shadow-sm block" type="text" placeholder="{{__('Search')}}" />
                            <div wire:click="clear" class="absolute inset-y-0 left-0 pl-3 flex items-center text-sm leading-5 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            @if($search !== '')
                            <div wire:click="clear" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            @endif
                        </div>

                        <x-select name="section" id="section" class="w-2/4 text-gray-500 text-sm" :options="$sections" byDefect="{{__('Section')}}" />
                    </div>

                    <div class="flex col-span-1 lg:col-span-2 gap-4 w-full">
                        <x-select wire:model="role" name="role" id="role" class="w-full text-gray-500 text-sm" :options="$roles" byDefect="{{__('Role')}}" />

                        <select wire:model="status" name="status" id="status" class="w-full text-gray-500 bg-white dark:bg-black text-sm rounded-md shadow-sm block border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">{{__('Status')}}</option>
                            <option value="1">{{__('Active')}}</option>
                            <option value="0">{{__('Inactive')}}</option>
                        </select>

                        <x-jet-secondary-button wire:click="restart" class="px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </x-jet-secondary-button>

                        <select wire:model="perPage" name="perPage" id="perpage" class="w-auto pl-1.5 text-gray-500 bg-white dark:bg-black text-sm rounded-md shadow-sm block border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                    @if($users->count())
                    <table class="table-fixed min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                        <thead class="bg-gray-50 dark:bg-gray-900">
                            <tr>
                                <th scope="col" wire:click="order('name')" class="w-4/12 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <x-sort-icon name="name" :sort="$sort" :direction="$direction" />
                                    {{__('Name')}}&nbsp;/&nbsp;{{__('NIA')}}
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-600 bg-indigo-100 rounded-full">
                                        {{$users->total()}}
                                    </span>
                                </th>
                                <th scope="col" wire:click="order('email')" class="w-3/12 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <x-sort-icon name="email" :sort="$sort" :direction="$direction" />
                                    {{__('Email')}}
                                </th>
                                <th scope="col" wire:click="order('role')" class="w-1/12 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <x-sort-icon name="role" :sort="$sort" :direction="$direction" />
                                    {{__('Role')}}
                                </th>
                                <!-- <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Language')}}
                                </th> -->
                                <th scope="col" wire:click="order('last_login_at')" class="w-2/12 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <x-sort-icon name="last_login_at" :sort="$sort" :direction="$direction" />
                                    {{__('Status')}}&nbsp;/&nbsp;{{__('Accessed')}}
                                </th>
                                <th scope="col" class="w-2/12 relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-black divide-y divide-gray-200 dark:divide-gray-800">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gradient-to-r hover:from-gray-50 dark:hover:from-gray-900">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900 dark:text-gray-100">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{-- $user->nia --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-100 hover:underline">
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ __(userRole($user->role)) }}
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $languages[$user->locale] }}
                                </td> -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if( $user->status)
                                    <span class="px-1.5 inline-flex text-xs leading-1 font-semibold rounded-full bg-green-200 text-green-800">
                                        @else
                                        <span class="px-1.5 inline-flex text-xs leading-1 font-semibold rounded-full bg-red-200 text-red-800">
                                            @endif
                                            {{-- __($status[$user->status]) --}}&nbsp;
                                        </span>
                                        &nbsp;
                                        {{ ($user->last_login_at == null) ? __('never') : \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('users.show', $user) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Show') }}</a>
                                    <a href="{{ route('users.edit', $user) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                @if ($users->hasPages())

                <div class="bg-white dark:bg-black px-4 py-3 border-t border-gray-200 dark:border-gray-800 sm:px-6">
                    {{ $users->links() }}
                </div>

                @endif

                @else

                <div class="bg-white dark:bg-black px-4 py-3 border-t text-gray-500 border-gray-200 dark:border-gray-800 sm:px-6">
                    {{__('No results for the search ')}} <span class="font-bold">{{$search}}</span>
                </div>

                @endif

            </div>
        </div>

    </div>

    @endif

</div>