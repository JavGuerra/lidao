<div>

    @if($page > 1 && $page > ceil($users->total()/$perPage))

    <div class="mt-3 py-10 flex justify-center">
        @include('images.users')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no users to show') }}</div>

    @else

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 flex px-4 py-3 sm:px-6 bg-gradient-to-t from-gray-50">
                    <div class="flex col-span-1 lg:col-span-3 gap-4">
                        <div class="relative w-full">
                            <x-jet-input wire:model.debounce.500ms="search" autofocus="autofocus" name="search" id="search" class="w-full rounded-md shadow-sm block w-full" type="text" placeholder="{{__('Interactive search...')}}" />
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

                        <select wire:model="status" name="status" id="status" class="w-full text-gray-500 text-sm rounded-md shadow-sm block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">{{__('Status')}}</option>
                            <option value="1">{{__('Active')}}</option>
                            <option value="0">{{__('Inactive')}}</option>
                        </select>

                        <x-jet-secondary-button wire:click="restart">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-jet-secondary-button>

                        <select wire:model="perPage" name="perPage" id="perpage" class="w-auto pl-1.5 text-gray-500 text-sm rounded-md shadow-sm block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="w-3/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Name')}}&nbsp;/&nbsp;{{__('NIA')}}
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-600 bg-indigo-100 rounded-full">{{$users->total()}}</span>
                                </th>
                                <th scope="col" class="w-3/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Email')}}
                                </th>
                                <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Role')}}
                                </th>
                                <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Language')}}
                                </th>
                                <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Status')}}&nbsp;/&nbsp;{{__('Accessed')}}
                                </th>
                                <th scope="col" class="w-2/12 relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gradient-to-r hover:from-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $user->nia }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 hover:underline">
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ __($roles->get($user->role)->name) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $languages[$user->locale] }}
                                </td>
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

                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $users->links() }}
                </div>

                @endif

                @else

                <div class="bg-white px-4 py-3 border-t text-gray-500 border-gray-200 sm:px-6">
                    {{__('No results for the search ')}} <span class="font-bold">{{$search}}</span>
                </div>

                @endif

            </div>
        </div>

    </div>

    @endif

</div>