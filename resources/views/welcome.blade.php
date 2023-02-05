<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{url('images/logo.png')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>
<body>
<div>
    <main class="py-4">
        <section class="h-full gradient-form ">
            <div class="container py-24 px-6 ">
                <div class="flex justify-center items-center flex-wrap g-6 text-gray-800">
                    <div class="xl:w-96">
                        <div class="block bg-white shadow-lg rounded-lg">
                            <div class="lg:flex lg:flex-wrap g-0">
                                <div class="lg:w-96 px-4 md:px-0">
                                    <div class="md:p-12 md:mx-6">
                                        <div class="text-center">
                                            <img
                                                class="mx-auto w-32"
                                                src="{{url('images/logo.png')}}"
                                                alt="logo"
                                            />
                                            <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Poris Indah Smart School (POINSS)</h4>

                                            @if (Route::has('home'))
                                                @auth
                                                    <a href="{{ url('/home') }}">
                                                        <button
                                                            class="w-full h-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                            type="button"
                                                            data-mdb-ripple="true"
                                                            data-mdb-ripple-color="light"
                                                        >
                                                            Home
                                                        </button>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}">
                                                        <button
                                                            class="w-full h-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                            type="button"
                                                            data-mdb-ripple="true"
                                                            data-mdb-ripple-color="light"
                                                        >
                                                            Log in
                                                        </button>
                                                    </a>

{{--                                                    <a href="{{ route('register') }}">--}}
{{--                                                        <button--}}
{{--                                                            class="w-full h-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"--}}
{{--                                                            type="button"--}}
{{--                                                            data-mdb-ripple="true"--}}
{{--                                                            data-mdb-ripple-color="light"--}}
{{--                                                        >--}}
{{--                                                            Register--}}
{{--                                                        </button>--}}
{{--                                                    </a>--}}
                                                @endauth
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
