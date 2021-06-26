<x-app-layout>
  <x-slot name="header">
    <x-title-add title="{{ __('School years') }}" :link="route('schoolyears.create')" />
  </x-slot>
  <x-main>

    @if ($schoolyears->count())

    <!-- Curso seleccionado -->
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <table class="lg:table-fixed lg:w-full min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th scope="col" class="whitespace-nowrap w-max px-6 py-2 text-left text-lg leading-6 font-medium text-gray-900 tracking-wider">
                    {{__('School year active')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Start')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('End')}}
                  </th>
                  <th scope="col" class="whitespace-nowrap w-2/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created by')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created')}}
                  </th>
                  <!-- <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Closed')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Updated')}}
                  </th> -->
                  <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Classrooms')}}
                  </th>
                  <th scope="col" class="w-max relative px-6 py-3">
                    <span class="sr-only">{{ __('Show and edit') }}</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr class="bg-gray-50">
                  <td class="px-6 py-4 font-medium text-gray-900">
                    <span class="inline">{{ $selected->name }}</span>
                    @if($selected->annotation != null)
                    <dfn title="{{ $selected->annotation }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                      </svg>
                    </dfn>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ $selected->start_at }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ $selected->end_at }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">
                    {{ user_name($selected->id_creator) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($selected->created_at)->format('d M Y') }}
                  </td>
                  <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @if($selected->closed_at != null)
                    {{ \Carbon\Carbon::parse($selected->closed_at)->format('d M Y') }}
                    @else
                    --
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @if($selected->updated_at != null && $selected->updated_at != $selected->created_at)
                    {{ \Carbon\Carbon::parse($selected->updated_at)->format('d M Y') }}
                    @else
                    --
                    @endif
                  </td> -->
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    -{{ num_classrooms($selected->id) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('schoolyears.show', $selected) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('View') }}</a>
                    <a href="{{ route('schoolyears.edit', $selected) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Otros cursos -->
    @if ($schoolyears->count() > 1)
    <x-jet-section-border />
    <div class="my-10 sm:hidden"> </div>

    <div class="bg-white overflow-hidden shadow sm:rounded-lg border-b border-gray-200">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <table class="lg:table-fixed lg:w-full min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="whitespace-nowrap w-max px-6 py-2 text-left text-lg leading-6 font-medium text-gray-900 tracking-wider">
                    {{__('Other school years')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Start')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('End')}}
                  </th>
                  <th scope="col" class="whitespace-nowrap w-2/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created by')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created')}}
                  </th>
                  <!-- <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Closed')}}
                  </th>
                  <th scope="col" class="w-1/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Updated')}}
                  </th> -->
                  <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Classrooms')}}
                  </th>
                  <th scope="col" class="w-max relative px-6 py-3">
                    <span class="sr-only">{{ __('Show and edit') }}</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($schoolyears as $schoolyear)
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-medium text-gray-900">
                    <span class="inline">{{ $schoolyear->name }}</span>
                    @if($schoolyear->annotation != null)
                    <dfn title="{{ $schoolyear->annotation }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                      </svg>
                    </dfn>
                    @endif
                    @if($schoolyear->selected)
                    <span class="ml-2 px-2 inline text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      {{ __( $status[true] ) }}
                    </span>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ $schoolyear->start_at }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ $schoolyear->end_at }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">
                    {{ user_name($schoolyear->id_creator) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($schoolyear->created_at)->format('d M Y') }}
                  </td>
                  <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @if($schoolyear->closed_at != null)
                    {{ \Carbon\Carbon::parse($schoolyear->closed_at)->format('d M Y') }}
                    @else
                    --
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @if($schoolyear->updated_at != null && $schoolyear->updated_at != $schoolyear->created_at)
                    {{ \Carbon\Carbon::parse($schoolyear->updated_at)->format('d M Y') }}
                    @else
                    --
                    @endif 
                  </td>-->
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ num_classrooms($schoolyear->id) }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('schoolyears.show', $schoolyear) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('View') }}</a>
                    <a href="{{ route('schoolyears.edit', $schoolyear) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>

            @if ($schoolyears->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
              {{ $schoolyears->links() }}
            </div>
            @endif

            @endif

          </div>
        </div>
      </div>
    </div>

    @else

    <div class="mt-3 py-10 flex justify-center">
      @include('schoolyears.background-image')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no school years to show') }}</div>

    @endif

  </x-main>
</x-app-layout>