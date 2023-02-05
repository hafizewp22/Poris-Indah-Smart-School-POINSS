@extends('layouts.main_master')

@section('content')
    <section class="h-full gradient-form md:h-auto">
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
                                            src="https://www.porisindah.sch.id/assets/img/porisindah_square.png"
                                            alt="logo"
                                        />
                                        <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Register User</h4>
                                    </div>

{{--                                    <form method="POST" action="{{ route('register') }}">--}}
{{--                                        @csrf--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('name') is-invalid @enderror"--}}
{{--                                                name="name"--}}
{{--                                                required--}}
{{--                                                autocomplete="name"--}}
{{--                                                value="{{ old('name') }}"--}}
{{--                                                id="name"--}}
{{--                                                placeholder="Name"--}}
{{--                                            />--}}
{{--                                            @error('name')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                                <strong>{{ $message }}</strong>--}}
{{--                                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <input--}}
{{--                                                type="username"--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('username') is-invalid @enderror"--}}
{{--                                                name="username"--}}
{{--                                                required--}}
{{--                                                autocomplete="username"--}}
{{--                                                value="{{ old('username') }}"--}}
{{--                                                id="username"--}}
{{--                                                placeholder="NISN/NIGN"--}}
{{--                                            />--}}
{{--                                            @error('username')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                                <strong>{{ $message }}</strong>--}}
{{--                                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <input--}}
{{--                                                type="email"--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('email') is-invalid @enderror"--}}
{{--                                                name="email"--}}
{{--                                                required--}}
{{--                                                autocomplete="email"--}}
{{--                                                value="{{ old('email') }}"--}}
{{--                                                id="email"--}}
{{--                                                placeholder="Email"--}}
{{--                                            />--}}
{{--                                            @error('email')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                                <strong>{{ $message }}</strong>--}}
{{--                                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <select--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('grade') is-invalid @enderror"--}}
{{--                                                id="grade"--}}
{{--                                                name="grade"--}}
{{--                                                required--}}
{{--                                                autocomplete="grade"--}}
{{--                                                value="{{ old('grade') }}"--}}
{{--                                            >--}}
{{--                                                <option value="1">Male</option>--}}
{{--                                                <option value="2">Female</option>--}}
{{--                                            </select>--}}

{{--                                            @error('grade')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                                <strong>{{ $message }}</strong>--}}
{{--                                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('phone') is-invalid @enderror"--}}
{{--                                                name="phone"--}}
{{--                                                required--}}
{{--                                                autocomplete="phone"--}}
{{--                                                value="+62{{ old('phone') }}"--}}
{{--                                                id="phone"--}}
{{--                                                placeholder="Phone"--}}
{{--                                            />--}}
{{--                                            @error('phone')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                                <strong>{{ $message }}</strong>--}}
{{--                                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <input--}}
{{--                                                type="password"--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('password') is-invalid @enderror"--}}
{{--                                                name="password"--}}
{{--                                                required--}}
{{--                                                autocomplete="new-password"--}}
{{--                                                id="password"--}}
{{--                                                placeholder="Password"--}}
{{--                                            />--}}
{{--                                            @error('password')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                                <strong>{{ $message }}</strong>--}}
{{--                                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}

{{--                                        <div class="mb-4">--}}
{{--                                            <input--}}
{{--                                                type="password"--}}
{{--                                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('password') is-invalid @enderror"--}}
{{--                                                name="password_confirmation"--}}
{{--                                                required--}}
{{--                                                autocomplete="new-password"--}}
{{--                                                id="password-confirm"--}}
{{--                                                placeholder="Confirm Password"--}}
{{--                                            />--}}
{{--                                        </div>--}}

{{--                                        <div class="text-center pt-1 mb-12 pb-1">--}}
{{--                                            <button--}}
{{--                                                class=" text-white bg-[#27283A] hover:bg-[#27283A] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full mb-3"--}}
{{--                                                type="submit"--}}
{{--                                                data-mdb-ripple="true"--}}
{{--                                                data-mdb-ripple-color="light"--}}
{{--                                            >--}}
{{--                                                Register--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex items-center justify-between pb-6">--}}
{{--                                            <p class="mb-0 mr-2">I already have an account.</p>--}}
{{--                                            <button--}}
{{--                                                type="button"--}}
{{--                                                class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"--}}
{{--                                                data-mdb-ripple="true"--}}
{{--                                                data-mdb-ripple-color="light"--}}
{{--                                            >--}}
{{--                                                Login--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}

                                    <h4 class="text-xl text-center font-semibold mb-6">Currently Register an user via School Admin.</h4>

                                    <div class="flex items-center justify-between pb-6">
                                        {{--                                    <p class="mb-0 mr-2">I already have an account.</p>--}}
                                        <a href="{{ url('/') }}">
                                            <button
                                                type="button"
                                                class="inline-block px-6 py-2 border-2 border-[#27283A] text-[#27283A] font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                            >
                                                Home
                                            </button>
                                        </a>

                                        <a href="{{ route('login') }}">
                                            <button
                                                type="button"
                                                class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                            >
                                                Login
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
                                style="background: linear-gradient(to right, #27283a, #545959, #2f336c, #04043d);"
                            >
                                <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                    <h4 class="text-xl font-semibold mb-6">Information for User Registration</h4>
                                    <p class="text-sm">
                                        For those who do not have an account or want to register a Learning Management System (LMS) account for teachers and students. Please contact the curriculum department or your homeroom teacher to request a NISN/NIGN account and request input of your email into the school data. <br />
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
