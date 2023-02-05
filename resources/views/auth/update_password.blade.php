<div class="lg:w-6/12 px-4 md:px-0">
    <div class="md:p-12 md:mx-6">
        <div class="text-center">
            <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Update Password</h4>
        </div>
        <form method="POST" action="{{route('profile.update.password')}}">
            @csrf
            <div class="mb-4">
                <div class="mb-3">
                    <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Old Password <span class="text-danger">*</span></label>
                    <input
                        type="password"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('current_password') is-invalid @enderror "
                        name="current_password"
                        required
                        autocomplete="current_password"
                        id="current_password"
                        placeholder="*********"
                    />
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New Password <span class="text-danger">*</span></label>
                    <input
                        type="password"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('new_password') is-invalid @enderror"
                        name="new_password"
                        required
                        autocomplete="new_password"
                        id="new_password"
                        placeholder="*********"
                    />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm Password <span class="text-danger">*</span></label>
                    <input
                        type="password"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none @error('new_confirm_password') is-invalid @enderror"
                        name="new_confirm_password"
                        required
                        autocomplete="new_confirm_password"
                        id="password_confirmation"
                        placeholder="*********"
                    />
                    @error('new_confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="text-center pt-1 mb-12 pb-1">
                <button
                    class="text-white bg-[#27283A] hover:bg-[#27283A] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full mb-3"
                    type="submit"
                    data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                >
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>
