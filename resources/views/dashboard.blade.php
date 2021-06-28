<x-app-layout>
    <x-slot name="header">
        <x-title title="{{ __('Dashboard') }}"></x-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-full sm:mx-auto mb-4">
                <div class="sm:flex sm:space-x-4">

                    <a href="{{ route('classrooms.index') }}" class="inline-block align-bottom bg-white rounded-lg text-left hover:scale-105 overflow-hidden shadow-lg transform transition-all mb-4 w-full sm:w-1/4 ">
                        <div class="bg-white p-5 flex items-stretch">
                            <div class="sm:flex sm:items-start w-3/4 sm:w-2/3">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="uppercase text-sm leading-6 font-medium text-gray-400">{{__('Classrooms')}}</h3>
                                    <p class="text-3xl font-bold text-black">{{ $classrooms }}</p>
                                </div>
                            </div>
                            <div class="w-1/4 sm:w-1/3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('users.index') }}" class="inline-block align-bottom bg-white rounded-lg text-left hover:scale-105 overflow-hidden shadow-lg transform transition-all mb-4 w-full sm:w-1/4">
                        <div class="bg-white p-5 flex items-stretch">
                            <div class="sm:flex sm:items-start w-3/4 sm:w-2/3">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="uppercase text-sm leading-6 font-medium text-gray-400">{{__('Teachers')}}</h3>
                                    <p class="text-3xl font-bold text-black">{{ $teachers }}</p>
                                </div>
                            </div>
                            <div class="w-1/4 sm:w-1/3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('users.index') }}" class="inline-block align-bottom bg-white rounded-lg text-left hover:scale-105 overflow-hidden shadow-lg transform transition-all mb-4 w-full sm:w-1/4">
                        <div class="bg-white p-5 flex items-stretch">
                            <div class="sm:flex sm:items-start w-3/4 sm:w-2/3">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="uppercase text-sm leading-6 font-medium text-gray-400">{{__('Students')}}</h3>
                                    <p class="text-3xl font-bold text-black">{{ $students }}</p>
                                </div>
                            </div>
                            <div class="w-1/4 sm:w-1/3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('books.index') }}" class="inline-block align-bottom bg-white rounded-lg text-left hover:scale-105 overflow-hidden shadow-lg transform transition-all mb-4 w-full sm:w-1/4">
                        <div class="bg-white p-5 flex items-stretch">
                            <div class="sm:flex sm:items-start w-3/4 sm:w-2/3">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="uppercase text-sm leading-6 font-medium text-gray-400">{{__('Books')}}</h3>
                                    <p class="text-3xl font-bold text-black">{{ $books }}</p>
                                </div>
                            </div>
                            <div class="w-1/4 sm:w-1/3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="mt-6 border-b border-gray-200 bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="min-w-full bg-gray-50 border-b border-gray-200">
                    <div class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('About') }}
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg> -->
                    </div>
                </div>

                <div class="p-6 sm:px-20">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="mt-6">
                                @include('logos.application-logo', ['attributes' => 'block h-12 w-auto'])
                            </div>
                            <div class="text-2xl mt-6">{{ __('Wellcome') }} {{ auth()->user()->name }}</div>
                        </div>

                        <div class="mt-5 md:mt-0 md:col-span-2 bg-white text-gray-500">
                            <p class="my-4">{{ __("This project develops an educational Web platform to promote and improve knowledge of the spelling rules of Spanish and their reading and writing skills, through the use of interactive digital books adapted by age. The platform will be offered as a didactic tool for the teacher, who will be able to define the different virtual classes, the students who will participate in them and the books that each class must complete, being able to monitor the status of their students' readings.") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>