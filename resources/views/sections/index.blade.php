<x-app-layout>
  <x-slot name="header">
    <x-title title="{{ __('Sections') }}" :link=" thereIsAnActiveSchoolyear() ? route('sections.create') : '' " />
  </x-slot>
  <x-main>

    @if ($sections->count())

    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <table class="lg:table-fixed lg:w-full min-w-full divide-y divide-gray-200">

              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="whitespace-nowrap w-2/5 px-6 text-left text-lg leading-6 font-medium text-gray-900 tracking-wider">
                    {{__('Sections list')}}
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-600 bg-indigo-100 rounded-full">{{$sections->total()}}</span>
                  </th>
                  <th scope="col" class="w-2/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Level')}}
                  </th>
                  <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Teachers')}}
                  </th>
                  <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Students')}}
                  </th>
                  <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Books')}}
                  </th>
                  <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Updated')}}
                  </th>
                  <th scope="col" class="w-2/12 relative px-6 py-3">
                    <span class="sr-only">{{ __('Show and edit') }}</span>
                  </th>
                </tr>
              </thead>

              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($sections as $section)
                <tr class="hover:bg-gradient-to-r hover:from-gray-50">
                  <td class="px-6 py-4 font-medium text-gray-900">
                    <span class="inline">{{ $section->name }}</span>
                    @if($section->annotation != null)
                    <dfn title="{{ $section->annotation }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                      </svg>
                    </dfn>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{__($stagelevels[$section->stagelevel_id]->short)}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    <!-- TODO inidicar número de profesores asociados a esta sección -->
                    <span class="font-bold">0</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                    <a href="{{ route('users.index') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                      0
                    </a>
                    <a href="{{ route('users.create') }}" class="px-1 py-1 ml-2 text-indigo-600  bg-white hover:text-indigo-900 border border-gray-300 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        <span class="sr-only">{{__('Add')}}</span>
                      </svg>
                    </a>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                    <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                      0
                    </a>
                    <a href="{{ route('books.create') }}" class="px-1 py-1 ml-2 text-indigo-600  bg-white hover:text-indigo-900 border border-gray-300 rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        <span class="sr-only">{{__('Add')}}</span>
                      </svg>
                    </a>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    @if($section->updated_at != $section->created_at)
                    {{ \Carbon\Carbon::parse($section->updated_at)->format('d M Y') }}
                    @else
                    {{__('No')}}
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('sections.show', $section) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Show') }}</a>
                    <a href="{{ route('sections.edit', $section) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>

            <!-- Paginación -->
            @if ($sections->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
              {{ $sections->links() }}
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>


    @else

    <div class="mt-3 py-10 flex justify-center">
      @include('images.sections')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no sections to show') }}</div>

    @endif

  </x-main>
</x-app-layout>