<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ Str::limit($user->name, 64) }}" />
  </x-slot>
  <x-main-container>

    <!-- Ficha -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">

      <div class="flex justify-between border-b border-gray-200">
        <div class="px-4 py-4 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('User information') }}
          </h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
            {{ __('Details of the user.') }}
          </p>
        </div>
        <div>
          <div class="px-4 py-4 sm:px-6">
            <a autofocus="autofocus" role="button" href="{{ route('users.edit', $user) }}" class="inline-flex items-center ml-2 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
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
            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <span class="sr-only">{{ __('Name') }}</span>
              </dt>
              <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-4">
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
              </dd>
            </div>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{ __('Email') }}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                {{ $user->email }}
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-4 grid grid-cols-2 gap-4 sm:px-6">
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{ __('Rol') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  {{ __($roles->get($user->role)->name) }}
                </dd>
              </div>
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{__('Language')}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  {{ $languages[$user->locale] }}
                </dd>
              </div>
            </div>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{ __('Section') }}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                --
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-4 grid grid-cols-2 gap-4 sm:px-6">
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{ __('Accessed') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  {{ ($user->last_login_at == null) ? __('Never') : \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}
                </dd>
              </div>
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{__('Login IP')}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  {{ $user->last_login_ip }}
                </dd>
              </div>
            </div>
          </dl>
        </div>

        <!-- Columna derecha -->
        <div class="sm:col-span-2 border-t border-gray-200 sm:border-0">
          <dl>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                {{__('Status')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if($user->status)
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
                {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y H:i') }}
              </dd>
            </div>
            @if($user->updated_at != null && $user->updated_at != $user->created_at)
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                {{__('Updated')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ \Carbon\Carbon::parse($user->updated_at)->format('d M Y H:i') }}
              </dd>
            </div>
            @endif
            @if(!$user->status && $user->inactived != null)
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                {{__('Inactive')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ \Carbon\Carbon::parse($user->inactived_at)->format('d M Y H:i') }}
              </dd>
            </div>
            @endif
          </dl>
        </div>

      </div>

      <div class="pb-2 sm:border-t sm:border-gray-200"></div>

    </div>

  </x-main-container>
</x-app-layout>