<x-app-layout>
  <x-slot name="header">
    <x-title-add title="{{ __('Users') }}" link="{{ route('users.create') }}"></x-title-add>
  </x-slot>
  <x-main-container>

    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Name')}} / {{__('NIA')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Email')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Status')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Role')}}
                  </th>
                  <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Language')}}
                      </th> -->
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
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
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
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      {{ __($status[$user->status]) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ __($roles[$user->role]) }}
                  </td>
                  <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {{ $languages[$user->locale] }}
                      </td> -->
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                  </td>
                </tr>
                @endforeach

                <!-- More people... -->
              </tbody>
            </table>

            @if ($users->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
              {{ $users->links() }}
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>

  </x-main-container>
</x-app-layout>