<x-app-layout>
  <x-slot name="header">
    <x-title-add title="{{ __('School years') }}" link="{{ route('schoolyears.create') }}"></x-title-add>
  </x-slot>
  <x-main-container>

    @if ($schoolyears->count())

    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Name')}} &nbsp;/&nbsp; {{__('Selected')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Start')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('End')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Status')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created by')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Updated')}}
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($schoolyears as $schoolyear)
                <tr>
                  <td class="flex px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                    {{ $schoolyear->name }}
                    @if($schoolyear->description != null)
                    &nbsp;&nbsp;
                    <dfn title="{{ $schoolyear->description }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                      </svg>
                    </dfn>
                    @endif
                    @if($schoolyear->selected)
                    &nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">{{__('Selected')}}</span>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ $schoolyear->start_at }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    {{ $schoolyear->end_at }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                    @if( $schoolyear->status)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      @else
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        @endif
                        {{ __($status[$schoolyear->status]) }}
                      </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{-- $created_by --}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($schoolyear->created_at)->format('d M Y') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    @if($schoolyear->updated_at != null && $schoolyear->updated_at != $schoolyear->created_at)
                    {{ \Carbon\Carbon::parse($schoolyear->updated_at)->format('d M Y') }}
                    @else
                    --
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <!-- <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a> -->
                    {{ __('Edit') }}
                  </td>
                </tr>
                @endforeach

                <!-- More people... -->
              </tbody>
            </table>

            @if ($schoolyears->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
              {{ $schoolyears->links() }}
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>

    @else

    <div class="min-w-full bg-gray-50 border-b border-gray-200">
      <div class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        {{ __('Whoops!') }}
      </div>
    </div>

    <div class="mt-3 py-10 flex justify-center">
      @include('schoolyears.background-image')
    </div>

    <div class="text-center text-2xl text-gray-500 mb-10">{{ __('There are no registered school years') }}</div>

    @endif

  </x-main-container>
</x-app-layout>