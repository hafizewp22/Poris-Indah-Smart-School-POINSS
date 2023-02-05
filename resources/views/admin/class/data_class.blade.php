@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Class and AY Data</h3>
    </div>

    <div>
        <div class="flex justify-between ">
            <div>
                <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal-class">Add Class</button>
                <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal-ay">Add Academic Year</button>
                <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="view-modal-ay">View Academic Year</button>
            </div>

            <form class="flex" method="GET" action={{route('data.class')}}>
                <input
                    id="search"
                    type="text"
                    name="search"
                    class="rounded-l-lg p-2 border-t  border-b border-l text-gray-800 border-gray-200 bg-white"
                    placeholder="Search by class or major"
                />
                <button class="px-8 rounded-r-lg bg-yellow-400  text-gray-800 font-bold ">Search</button>
            </form>
        </div>



        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">

            @foreach($userClass as $data)
                <div class="pb-6">
                    <div class="box-border h-25 pt-6 rounded-lg pt-2 pb-2  p-4 bg-[#464867]">
                        <div class="flex justify-between">
                            <div>
                                <div class="break-all space-y-2 pl-5">
                                    <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold ">Class: {{ $data->name_class }}</h1>
                                    <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Major: {{ $data->major == 1 ? 'Science': 'Social' }}</h1>
                                    <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Homeroom Teacher: {{$data->teachers->username}} - {{ $data->teachers->name }}</h1>
                                </div>

                            </div>

                            <div class="pr-4 flex flex-wrap -mx-3 place-items-center space-x-4 ">
                                <a href="{{ route('view.class.student', $data->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                                <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.class', $data->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                                <a type="button" data-modal-toggle="{{ route('edit.class', $data->id) }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main modal Edit Class-->
                <div id="{{ route('edit.class', $data->id) }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{ route('edit.class', $data->id) }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Class</h3>
                                <form class="space-y-6" method="POST" action="{{ route('update.class') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Class <span class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="name_class"
                                            id="name_class"
                                            autocomplete="name_class"
                                            value="{{ $data->name_class }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_class') is-invalid @enderror"
                                            required
                                            placeholder="12 Science 1"
                                        >

                                        @error('name_class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Major <span class="text-danger">*</span></label>
                                        <select
                                            id="major"
                                            name="major"
                                            required
                                            autocomplete="major"
                                            value="{{ $data->major }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('major') is-invalid @enderror"
                                        >
                                            <option value="1" {{old('major',$data->major)=="1"? 'selected':''}}>Science</option>
                                            <option value="2" {{old('major',$data->major)=="2"? 'selected':''}}>Social</option>
                                        </select>

                                        @error('major')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="id_teacher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Homeroom Teacher <span class="text-danger">*</span></label>
                                        <select
                                            id="id_teacher"
                                            name="id_teacher"
                                            required
                                            autocomplete="id_teacher"
                                            value="{{ $data->name }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_teacher') is-invalid @enderror"
                                        >
                                            @foreach($userTeacher as $dataTeacher)
                                                @if($dataTeacher->user_type == '2')
                                                    <option value="{{$dataTeacher->id}}" {{ $dataTeacher->id == $data->teachers->id ? 'selected': ''}}>{{$dataTeacher->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @error('major')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Edit Data" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popup-modal-{{route('model.delete.class', $data->id)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this class?</h3>
                                <a  href="{{ route('delete.class', $data->id) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Yes, I'm sure
                                </a>
                                <button data-modal-toggle="popup-modal-{{route('model.delete.class', $data->id)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$userClass->links()}}
    </div>

    <!-- Main modal Add Class-->
    <div id="add-modal-class" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal-class">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Class</h3>
                    <form class="space-y-6" method="POST" action="{{ route('add.class') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Class <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="name_class"
                                id="name_class"
                                autocomplete="name_class"
                                value="{{ old('name_class') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_class') is-invalid @enderror"
                                required
                                placeholder="12 Science 1"
                            >

                            @error('name_class')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Major <span class="text-danger">*</span></label>
                            <select
                                id="major"
                                name="major"
                                required
                                autocomplete="major"
                                value="{{ old('major') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('major') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Major</option>
                                <option value="1">Science</option>
                                <option value="2">Social</option>
                            </select>

                            @error('major')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_teacher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Homeroom Teacher <span class="text-danger">*</span></label>
                            <select
                                id="id_teacher"
                                name="id_teacher"
                                required
                                autocomplete="id_teacher"
                                value="{{ old('id_teacher') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_teacher') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Teacher</option>
                                @foreach($userTeacher as $dataTeacher)
                                    @if($dataTeacher->user_type == '2')
                                        <option value={{$dataTeacher->id}}>{{$dataTeacher->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('id_teacher')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Add Data" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal Add AY-->
    <div id="add-modal-ay" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal-ay">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Academic Year</h3>
                    <form class="space-y-6" method="POST" action="{{ route('add.ay') }}">
                        @csrf
                        <div>
                            <label for="name_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="name_academic_year"
                                id="name_academic_year"
                                autocomplete="name_academic_year"
                                value="{{ old('name_academic_year') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_academic_year') is-invalid @enderror"
                                required
                                placeholder="2020 / 2021"
                            >

                            @error('name_academic_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Add Data" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal View AY-->
    <div id="view-modal-ay" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="view-modal-ay">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">View Academic Year</h3>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867] dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Academic Year
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userAY as $data)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$data->name_academic_year }}
                                    </th>
                                    <td class="py-4 px-6">
                                        <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.ay', $data->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                                <div id="popup-modal-{{route('model.delete.ay', $data->id)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this academic year?</h3>
                                                <a  href="{{ route('delete.ay', $data->id) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Yes, I'm sure
                                                </a>
                                                <button data-modal-toggle="popup-modal-{{route('model.delete.ay', $data->id)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal Add Student Class-->
    {{--    <div id="add-modal-student" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">--}}
    {{--        <div class="relative p-4 w-full max-w-md h-full md:h-auto">--}}
    {{--            <!-- Modal content -->--}}
    {{--            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
    {{--                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal-student">--}}
    {{--                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
    {{--                    <span class="sr-only">Close modal</span>--}}
    {{--                </button>--}}
    {{--                <div class="py-6 px-6 lg:px-8">--}}
    {{--                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Students to Class</h3>--}}
    {{--                    <form class="space-y-6" method="POST" action="{{ route('add.class.student') }}">--}}
    {{--                        @csrf--}}
    {{--                        <div>--}}
    {{--                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Class <span class="text-danger">*</span></label>--}}
    {{--                            <select--}}
    {{--                                id="id_user"--}}
    {{--                                name="id_user"--}}
    {{--                                required--}}
    {{--                                autocomplete="id_user"--}}
    {{--                                value="{{ old('id_user') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_user') is-invalid @enderror"--}}
    {{--                            >--}}
    {{--                                <option selected="" disabled="">Select Student</option>--}}
    {{--                                @foreach($userStudent as $dataStudent)--}}
    {{--                                    @if($dataStudent->user_type == '0')--}}
    {{--                                        <option value={{$dataStudent->id}}>{{$dataStudent->name}}</option>--}}
    {{--                                    @endif--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}

    {{--                            @error('id_user')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Major <span class="text-danger">*</span></label>--}}
    {{--                            <select--}}
    {{--                                id="id_class"--}}
    {{--                                name="id_class"--}}
    {{--                                required--}}
    {{--                                autocomplete="id_class"--}}
    {{--                                value="{{ old('id_class') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_user') is-invalid @enderror"--}}
    {{--                            >--}}
    {{--                                <option selected="" disabled="">Select Class</option>--}}
    {{--                                @foreach($userClass as $dataClass)--}}
    {{--                                    <option value={{$dataClass->id}}>{{$dataClass->name_class}} / {{$dataClass->major == 1 ? 'Science': 'Social'}}</option>--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}

    {{--                            @error('major')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Add Data" >--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


@endsection




