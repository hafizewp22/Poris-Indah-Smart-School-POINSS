@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Subject</h3>
    </div>

    <div>
        <div>
            <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal">Add Subject</button>
        </div>

        <form class="flex" method="GET" action="{{route('search.subject')}}">
            <div class="flex">
                <div class="flex flex-wrap place-items-center ">
                    <div class="md:w-40 px-3" >
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                            Class
                        </label>
                    </div>
                    <div class="md:w-48 px-3">
                        <select
                            id="SearchClass"
                            name="SearchClass"
                            class="form-control appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap place-items-center ">
                    <div class="md:w-40 px-3" >
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                            Academy Year
                        </label>
                    </div>
                    <div class="md:w-64 px-3">
                        <select
                            id="SearchAcademyYear"
                            name="SearchAcademyYear"
                            class="form-control appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            @foreach($userAcademyYears as $dataAcademyYear )
                                <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="md:w-48 px-3">
                    <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none">View</button>
                </div>
            </div>
        </form>

        <div class="pt-1 pb-6 lg:h-96 xl:h-[27rem] overflow-y-scroll scrollbar ">
            <div class="flex flex-wrap">
                @foreach($dataSubject as $data)
                    <div
                        class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm box-content h-56 w-48 p-4 mr-4 mt-4 border-4">
                        <h1 class="text-xl font-bold ">{{$data->name_subject}}</h1>
                        <h4 class="mt-1 text-base">{{$data->classs->name_class}} ({{$data->classs->major == 1 ? 'Science' : 'Social'}})</h4>

                        <div class="mt-2 text-gray-100 text-sm flex items-center gap-x-4  rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <h1 class="text-bold">{{$data->teachers->name}}</h1>
                        </div>

                        <div class="mt-2 text-gray-100 text-sm flex items-center gap-x-4  rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11h4m-2-2v4"></path>
                            </svg>
                            <h1 class="text-bold">{{$data->subjectType->subject_type}}</h1>
                        </div>

                        <div class="mt-2 text-gray-100 text-sm flex items-center gap-x-4  rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11h4m-2-2v4"></path>
                            </svg>
                            <h1 class="text-bold">{{$data->academicYear->name_academic_year}}</h1>
                        </div>

                        <div class="mt-3 flex justify-between">
                            <a href="{{route('view.class.subject', $data->id_sub)}}" class="place-items-center space-x-4 focus:outline-none text-black-50 bg-white hover:bg-white font-medium rounded-lg text-sm px-3 py-2.5 space-x-4 " >View</a>
                            <div class="flex flex-wrap place-items-center space-x-4 ">
                                <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.subject', $data->id_sub)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                                <a type="button" data-modal-toggle="{{ route('edit.subject', $data->id_sub) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Main modal Update -->
                    <div id="{{ route('edit.subject', $data->id_sub) }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{ route('edit.subject', $data->id_sub) }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="py-6 px-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Subject</h3>
                                    <form class="space-y-6" method="POST" action="{{route('update.subject')}}">
                                        @csrf
                                        <input type="hidden" name="id_sub" value="{{ $data->id_sub }}">
                                        <div>
                                            <label for="name_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Subject<span class="text-danger">*</span></label>
                                            <input
                                                type="text"
                                                name="name_subject"
                                                id="name_subject"
                                                autocomplete="name_subject"
                                                value="{{$data->name_subject}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_subject') is-invalid @enderror"
                                                required
                                                placeholder="Name Subject"
                                            >

                                            @error('name_subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="id_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class <span class="text-danger">*</span></label>
                                            <select
                                                name="id_class"
                                                id="id_class"
                                                autocomplete="id_class"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_class') is-invalid @enderror"
                                                required
                                            >
                                                @foreach($userClass as $dataClass)
                                                    <option value={{$dataClass->id}} {{ $dataClass->id == $data->classs->id ? 'selected': ''}}>{{$dataClass->name_class}}</option>
                                                @endforeach
                                            </select>

                                            @error('id_class')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="id_teacher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year <span class="text-danger">*</span></label>
                                            <select
                                                id="id_teacher"
                                                name="id_teacher"
                                                required
                                                autocomplete="id_teacher"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_teacher') is-invalid @enderror"
                                            >
                                                @foreach($userTeacher as $dataTeacher)
                                                    <option value={{$dataTeacher->id}} {{ $dataTeacher->id == $data->teachers->id ? 'selected': ''}}>{{$dataTeacher->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('id_teacher')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type Subjects <span class="text-danger">*</span></label>
                                            <select
                                                id="id_subject_type"
                                                name="id_subject_type"
                                                required
                                                autocomplete="id_subject_type"
                                                value="{{ old('id_subject_type') }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject_type') is-invalid @enderror"
                                            >
                                                @foreach($userSubjectType as $dataSubjectType)
                                                    <option value={{$dataSubjectType->id}} {{ $dataSubjectType->id == $data->subjectType->id ? 'selected': ''}}>{{$dataSubjectType->subject_type}}</option>
                                                @endforeach
                                            </select>

                                            @error('id_subject_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year <span class="text-danger">*</span></label>
                                            <select
                                                id="id_academic_year"
                                                name="id_academic_year"
                                                required
                                                autocomplete="id_academic_year"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                                            >
                                                @foreach($userAcademyYears as $dataAcademyYear)
                                                    <option value={{$dataAcademyYear->id}} {{ $dataAcademyYear->id == $data->academicYear->id ? 'selected': ''}}>{{$dataAcademyYear->name_academic_year}}</option>
                                                @endforeach
                                            </select>

                                            @error('id_academic_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="detail_material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Detail Information<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                 <textarea
                                                     name="detail_material"
                                                     id="detail_material"
                                                     autocomplete="detail_material"
                                                     required
                                                     data-input
                                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('detail_material') is-invalid @enderror"
                                                 >{{$data->detail_material}}</textarea>
                                            </div>

                                            @error('detail_material')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="text_book" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Text Book<span class="text-danger">*</span></label>
                                            <input
                                                type="text"
                                                name="text_book"
                                                id="text_book"
                                                autocomplete="text_book"
                                                value="{{ $data->text_book}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('text_book') is-invalid @enderror"
                                                required
                                                placeholder="Name Text Book"
                                            >

                                            @error('text_book')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Update Data" >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="popup-modal-{{route('model.delete.subject', $data->id_sub)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this subject?</h3>
                                    <a  href="{{ route('delete.subject', $data->id_sub) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        Yes, I'm sure
                                    </a>
                                    <button data-modal-toggle="popup-modal-{{route('model.delete.subject', $data->id_sub)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Main modal Add -->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Subject</h3>
                    <form class="space-y-6" method="POST" action="{{route('add.subject')}}">
                        @csrf
                        <div>
                            <label for="name_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Subject<span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="name_subject"
                                id="name_subject"
                                autocomplete="name_subject"
                                value="{{ old('name_subject') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_subject') is-invalid @enderror"
                                required
                                placeholder="Name Subject"
                            >

                            @error('name_subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class <span class="text-danger">*</span></label>
                            <select
                                name="id_class"
                                id="id_class"
                                autocomplete="id_class"
                                value="{{ old('id_class') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_class') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Class</option>
                                @foreach($userClass as $dataClass)
                                    <option value={{$dataClass->id}}>{{$dataClass->name_class}}</option>
                                @endforeach
                            </select>

                            @error('id_class')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_teacher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teacher <span class="text-danger">*</span></label>
                            <select
                                name="id_teacher"
                                id="id_teacher"
                                autocomplete="id_teacher"
                                value="{{ old('id_teacher') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_teacher') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Teacher</option>
                                @foreach($userTeacher as $dataTeacher)
                                    <option value={{$dataTeacher->id}}>{{$dataTeacher->name}}</option>
                                @endforeach
                            </select>

                            @error('id_teacher')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_subject_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type Subjects <span class="text-danger">*</span></label>
                            <select
                                id="id_subject_type"
                                name="id_subject_type"
                                required
                                autocomplete="id_subject_type"
                                value="{{ old('id_subject_type') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject_type') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Subject Type</option>
                                @foreach($userSubjectType as $dataSubjectType)
                                    <option value={{$dataSubjectType->id}}>{{$dataSubjectType->subject_type}}</option>
                                @endforeach
                            </select>

                            @error('id_subject_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year <span class="text-danger">*</span></label>
                            <select
                                id="id_academic_year"
                                name="id_academic_year"
                                required
                                autocomplete="id_academic_year"
                                value="{{ old('id_academic_year') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Academic Year</option>
                                @foreach($userAcademyYears as $dataAcademyYear)
                                    <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                                @endforeach
                            </select>

                            @error('id_academic_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="detail_material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Detail Information<span class="text-danger">*</span></label>
                            <div class="controls">
                                <textarea
                                    name="detail_material"
                                    id="detail_material"
                                    autocomplete="detail_material"
                                    required
                                    data-input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('detail_material') is-invalid @enderror"
                                >{{ old('detail_material') }}</textarea>
                            </div>

                            @error('detail_material')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="text_book" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Text Book<span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="text_book"
                                id="text_book"
                                autocomplete="text_book"
                                value="{{ old('text_book') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('text_book') is-invalid @enderror"
                                required
                                placeholder="Name Text Book"
                            >

                            @error('text_book')
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

@endsection




