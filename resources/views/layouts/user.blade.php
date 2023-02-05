<div class="p-4 ">
    <div class="container">
        <div class="absolute top-0 right-0 m-2 p-2">
            <!-- Authentication Links -->
            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="bg-white flex items-center rounded-full md:mr-0 focus:ring-4  border-4 focus:ring-gray-100  " type="button">
                <img class="mr-2 w-8 h-8 rounded-full" src="{{ (!empty(Auth::user()->profile_photo_path))? url('upload/images/admin_images/'.Auth::user()->profile_photo_path):url('images/no_images_user.jpg') }}" alt="user photo">
                <div class="text-left">
                    <div class="font-bold"> Welcome, {{ Auth::user()->name }} <br ></div>
                    Logged in as: {{ Auth::user()->user_type == 1 ? 'Admin': '' }} {{ Auth::user()->user_type == 2 ? 'Teacher': '' }} {{ Auth::user()->user_type == 0 ? 'Student': '' }}
                </div>
                <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatarName" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                    <div>User : {{ Auth::user()->user_type == 1 ? 'Admin': '' }} {{ Auth::user()->user_type == 2 ? 'Teacher': '' }} {{ Auth::user()->user_type == 0 ? 'Student': '' }}</div>
                    <div class="font-medium truncat">{{ Auth::user()->email }}</div>
                </div>
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownAvatarName">
                    <li>
                        <a href="{{route('profile')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-[#394258]" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
                    >
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
