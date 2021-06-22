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
                    {{__('Name')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Start date')}}
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('End date')}}
                  </th>
                  <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Created by')}}
                  </th> -->
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
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <dfn title="{{ $schoolyear->description }}">{{ $schoolyear->name }}</dfn>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ \Carbon\Carbon::parse($schoolyear->start_at)->format('d M Y') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ \Carbon\Carbon::parse($schoolyear->end_at)->format('d M Y') }}
                  </td>
                  <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{-- $created_by --}}
                  </td> -->
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ \Carbon\Carbon::parse($schoolyear->created_at)->format('d M Y') }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ \Carbon\Carbon::parse($schoolyear->updated_at)->format('d M Y') }}
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