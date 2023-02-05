@extends('layouts.main_master')

@section('content')
    <section class="h-full gradient-form  md:h-auto">
        <div class="container py-24 px-5">
            <div class="flex justify-center items-center flex-wrap g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="lg:flex lg:flex-wrap g-0">
                            <div class="lg:w-6/12 px-4 md:px-0">
                                <div class="md:p-12 md:mx-6">
                                    <div class="text-center">
                                        <img
                                            class="mx-auto w-36"
                                            src="{{url('images/logo.png')}}"
                                            alt="logo"
                                        />
                                        <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Login</h4>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-4">
                                            <input
                                                type="username"
                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('username') is-invalid @enderror  @error('email') is-invalid @enderror"
                                                name="username"
                                                required
                                                autocomplete="email"
                                                value="{{ old('username') }}"
                                                id="username"
                                                placeholder="NISN/NIGN"
                                            />
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input
                                                type="password"
                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('password') is-invalid @enderror"
                                                name="password"
                                                required
                                                autocomplete="current-password"
                                                id="password"
                                                placeholder="Password"
                                            />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-12 pb-1">
                                            <button
                                                class="text-white bg-[#27283A] hover:bg-[#27283A] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full mb-3"
                                                type="submit"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                            >
                                                Log in
                                            </button>
                                            <a class="text-gray-500" href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>
                                        <div class="flex items-center justify-between pb-6">
{{--                                            <a href="{{ url('/') }}">--}}
{{--                                                <button--}}
{{--                                                    type="button"--}}
{{--                                                    class="inline-block px-6 py-2 border-2 border-[#27283A] text-[#27283A] font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"--}}
{{--                                                    data-mdb-ripple="true"--}}
{{--                                                    data-mdb-ripple-color="light"--}}
{{--                                                >--}}
{{--                                                    Home--}}
{{--                                                </button>--}}

{{--                                            </a>--}}

{{--                                            <a href="{{ route('register') }}">--}}
{{--                                                <button--}}
{{--                                                    type="button"--}}
{{--                                                    class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"--}}
{{--                                                    data-mdb-ripple="true"--}}
{{--                                                    data-mdb-ripple-color="light"--}}
{{--                                                >--}}
{{--                                                    Register--}}
{{--                                                </button>--}}
{{--                                            </a>--}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div
                                class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                                style="background: linear-gradient(to right, #27283a, #545959, #2f336c, #04043d);"
                            >
                                <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                    <h4 class="text-xl font-semibold mb-6">We are more than just a company</h4>
                                    <p class="text-sm">
                                        The learning management system is a software application for the learning management system that emerged directly from e-Learning at this school. <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
