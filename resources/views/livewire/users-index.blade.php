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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex bg-white px-4 py-3 sm:px-6">
                    <div class="relative col-span-1">
                        <x-jet-input wire:model.debounce.500ms="search" autofocus="autofocus" name="search" id="search" class="form-input rounded-md shadow-sm block w-full" type="text" placeholder="{{__('Search')}}" />
                        @if($search !== '')
                        <div wire:click="clear" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        @endif
                    </div>

                    <div class="flex col-span-1 gap-4">
                        <x-select wire:model="role" wire:change="page1" name="role" id="role" class="w-full text-gray-500 text-sm" :options="$roles" />

                        <select wire:model="perPage" wire:change="page1" name="perPage" id="perpage" class="text-gray-500 text-sm form-input rounded-md shadow-sm block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                        <thead class="bg-gray-50 border-t border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Name')}} / {{__('NIA')}}
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-600 bg-indigo-100 rounded-full">{{$users->total()}}</span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Email')}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Status')}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Role')}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Language')}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{__('Accessed')}}
                                </th>
                                <th scope="col" class="relative px-6 py-3">
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
                                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if( $user->status)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            @endif
                                            {{ __($status[$user->status]) }}
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ __($roles->get($user->role)->name) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $languages[$user->locale] }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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