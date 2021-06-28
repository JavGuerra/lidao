<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LIDAO</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="antialiased">

    <div class="bg-white flex flex-col font-sans">
        <div class="container mx-auto px-8">

            <header class="flex flex-col sm:flex-row items-center justify-between py-5 relative">
                @include('logos.application-mark', ['attributes' => 'block h-16 w-auto'])
                <nav class="hidden md:flex text-lg">
                    <a href="#faq" class="text-gray-800 hover:text-blue-400 py-3 px-6">Servicios</a>
                    <a href="#about" class="text-gray-800 hover:text-blue-400 py-3 px-6">Acerca de</a>
                    <a href="#contact" class="text-gray-800 hover:text-blue-400 py-3 px-6">Contactar</a>
                </nav>

                @if (Route::has('login'))
                <div class="hidden sm:block">
                    <span class="uppercase text-blue-500 py-3 px-6">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm underline">Panel</a>
                        @else
                        <a href="{{ route('login') }}" class="text-sm underline">Iniciar sesión</a>
                    </span>

                    @if (Route::has('register'))
                    <span class="bg-blue-50 hover:bg-blue-100 rounded-full uppercase text-blue-500 py-3 px-6">
                        <a href="{{ route('register') }}" class="text-sm underline">Registrarse</a>
                    </span>
                    @endif
                    @endauth
                </div>
                @endif

                <button class="flex md:hidden flex-col absolute top-0 right-0 p-4 mt-5 border rounded">
                    <span class="w-5 h-px mb-1 bg-red-500"></span>
                    <span class="w-5 h-px mb-1 bg-red-500"></span>
                    <span class="w-5 h-px mb-1 bg-red-500"></span>
                </button>

                <!-- TODO opciones en menú desplegable -->
                
            </header>

            <main class="flex flex-col-reverse sm:flex-row jusitfy-between items-center py-8">
                <div class="sm:w-2/5 flex flex-col items-center sm:items-start text-center sm:text-left">
                    <h1 class="uppercase text-6xl text-blue-800 font-bold leading-none tracking-wide mb-2">Ortografía</h1>
                    <h2 class="uppercase text-4xl text-red-400 text-secondary tracking-widest mb-6">Libros Interactivos</h2>
                    <p class="text-gray-600 leading-relaxed mb-12">Aprender ortografía es una tarea pesada para los alumnos de educación primaria, que pierden atención e interés con facilidad. Mediante el uso de libros interactivos, podemos captar su atención para lograr un mayor interés en el aprendizaje.</p>
                    <a href="#faq" class="bg-blue-500 hover:bg-blue-800 py-3 px-6 uppercase text-lg font-bold text-white rounded-full">Saber más</a>
                </div>
                <div class="mb-16 sm:mb-0 mt-8 sm:mt-0 sm:w-3/5 sm:pl-12">

                    <!-- class="w-full h-64 sm:h-auto" -->
                    @include('image')

                </div>
            </main>

        </div>
    </div>
    <!-- </div> -->
    <footer class="text-gray-600 body-font">
        <div class="container px-5 pt-8 pb-5 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                @include('logos.application-logo', ['attributes' => 'block h-4 w-auto'])
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">(CC) BY-SA 2021 javguerra</p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>

</body>

</html>