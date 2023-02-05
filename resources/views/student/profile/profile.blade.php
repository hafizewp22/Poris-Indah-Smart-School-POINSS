@extends('layouts.main_master')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <section class="h-full gradient-form  md:h-auto">
        <div class="container py-24 px-5">
            <div class="flex justify-center items-center flex-wrap g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white shadow-lg rounded-lg">
                        <div class="lg:flex lg:flex-wrap g-0">
                            <div class="lg:w-6/12 px-4 md:px-0">
                                <div class="md:p-12 md:mx-6">

                                    <div class="text-center">
                                        <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Update Profile</h4>
                                    </div>
                                    <form method="POST" action="{{route('profile.admin.update.profile')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input
                                            type="hidden"
                                            name="name"
                                            value="{{Auth::user()->name}}"
                                        />

                                        <input
                                            type="hidden"
                                            name="username"
                                            value="{{Auth::user()->name}}"
                                        />

                                        <input
                                            type="hidden"
                                            name="grade"
                                            value="{{Auth::user()->grade}}"
                                        />

                                        <div class="mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                            <div
                                                class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            >{{Auth::user()->name}}</div>
                                        </div>

                                        <div class="grid gap-6  md:grid-cols-2">
                                            <div class="">
                                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NISN</label>
                                                <div
                                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >{{Auth::user()->username}}</div>
                                            </div>

                                            <div class="">
                                                <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gender</label>
                                                <div
                                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                >{{Auth::user()->grade == 1 ? 'Male': 'Female'}}</div>
                                            </div>
                                        </div>
                                        <div class="text-danger mb-3">Changes to personal data please contact the admin section.</div>

                                        <div class="grid gap-6  md:grid-cols-2">
                                            <div class="mb-3">
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email <span class="text-danger">*</span></label>
                                                <input
                                                    type="email"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('email') is-invalid @enderror"
                                                    name="email"
                                                    required=""
                                                    autocomplete="email"
                                                    id="email"
                                                    value="{{Auth::user()->email}}"
                                                />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone <span class="text-danger">*</span></label>
                                                <input
                                                    type="text"
                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('phone') is-invalid @enderror"
                                                    name="phone"
                                                    required=phone"
                                                    autocomplete="phone"
                                                    id="phone"
                                                    value="{{Auth::user()->phone}}"
                                                />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between pb-6">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Profile Image</h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('profile_photo_path') is-invalid @enderror" id="image"> </div>
                                                </div>
                                            </div>

                                            <div>
                                                <img id="showImage" src="{{ (!empty(Auth::user()->profile_photo_path))? url('upload/images/admin_images/'.Auth::user()->profile_photo_path):url('images/no_image.jpg') }}" class="rounded-full" style="width: 100px; height: 100px;">
                                            </div>
                                        </div>

                                        <div class="text-center pt-1 mb-2 pb-1">
                                            <button
                                                class="text-white bg-[#27283A] hover:bg-[#27283A] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full mb-3"
                                                type="submit"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                            >
                                                Update Profile
                                            </button>
                                        </div>

                                        <div class="text-center w-full ">
                                            <a
                                                class="text-white bg-[#FF0000] hover:bg-[#FF0000] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full mb-3"
                                                type="button"
                                                href="{{url('/home')}}"
                                                data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                            >
                                                Back
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @include('auth.update_password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
