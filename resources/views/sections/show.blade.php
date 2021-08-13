<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ Str::limit($section->name, 64) }}" />
  </x-slot>
  <x-main-container>

    <!-- Ficha -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">

      <div class="flex justify-between border-b border-gray-200">
        <div class="px-4 py-4 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('Section information') }}
          </h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
            {{ __('Details of the section.') }}
          </p>
        </div>
        <div>
          <div class="px-4 py-4 sm:px-6">
            <a autofocus="autofocus" role="button" href="{{ route('sections.edit', $section) }}" class="inline-flex items-center ml-2 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
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
                {{ $section->name }}
              </dd>
            </div>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{ __('School year') }}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                {{ $yearName }}
              </dd>
            </div>

            <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{ __('Section') }}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                {{__($stagelevels[$section->stagelevel_id - 1]->name)}}
              </dd>
            </div>

            <div class="bg-white px-4 py-4 grid grid-cols-2 gap-4 sm:px-6">
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{ __('Start') }} - {{ __('End') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  {{ $startYear }} - {{ $endYear }}
                </dd>
              </div>
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{__('Number of teachers')}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  <a href="{{ route('users.index') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                    0
                  </a>
                </dd>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-4 grid grid-cols-2 gap-4 sm:px-6">
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{__('Number of students')}}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  <a href="{{ route('enrollments.index') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                    0
                  </a>
                  <a role="button" href="{{ route('enrollments.create') }}" class="px-2 py-1 ml-2 text-indigo-600  bg-white hover:text-indigo-900 border border-gray-300 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                      <span class="sr-only">{{__('Add')}}</span>
                    </svg>
                  </a>
                </dd>
              </div>
              <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">
                  {{ __('Number of books') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-1">
                  <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                    0
                  </a>
                </dd>
              </div>
            </div>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{__('Annotations')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">
                {{ $section->annotation }}
              </dd>
            </div>
          </dl>
        </div>

        <!-- Columna derecha -->
        <div class="sm:col-span-2 border-t border-gray-200 sm:border-0">
          <dl>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                {{__('Created by')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ userName($section->creator_id) }}
              </dd>
            </div>
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                {{__('Created')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ \Carbon\Carbon::parse($section->created_at)->format('d M Y H:i') }}
              </dd>
            </div>
            @if($section->updated_at != null && $section->updated_at != $section->created_at)
            <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 sm:col-span-2">
                {{__('Updated')}}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ \Carbon\Carbon::parse($section->updated_at)->format('d M Y H:i') }}
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