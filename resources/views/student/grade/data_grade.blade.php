@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Grade</h3>
    </div>

    <form class="flex" method="GET" action={{route('search.grade.student')}}>
        <div class="flex">
            <div class="flex flex-wrap place-items-center ">
                <div class=" md:w-40 px-3" >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                        Academic Year
                    </label>
                </div>
                <div class="md:w-64 px-3">
                    <select
                        id="search"
                        name="search"
                        class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @foreach($userAcademyYear as $dataAcademyYear )
                            <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap place-items-center ">
                <div class=" md:w-40 px-3" >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                        Semester
                    </label>
                </div>
                <div class="md:w-64 px-3">
                    <select
                        id="searchSemester"
                        name="searchSemester"
                        class="form-control appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @foreach($userSemester as $dataSemester )
                            <option value={{$dataSemester->id}}>{{$dataSemester->name_semester}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="md:w-64 px-3">
                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none">View</button>
            </div>
        </div>
    </form>

    <div>
        <button data-modal-toggle="download-file" class="mb-3 box-border h-12 w-64 p-2 rounded-lg bg-[#FFAA06]">
            <div class="flex" >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                </svg>
                <h1 class="ml-2 text-xl text-white font-bold">Download Grade</h1>
            </div>
        </button>

        <h3 class="p-2 mb-2 text-xl font-bold text-gray-900 dark:text-white">Please select an academic year and semester to see your grade.</h3>
    </div>

    <!-- Main modal Add Class-->
    <div id="download-file" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="download-file">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Download Grade</h3>

                    <form class="space-y-6" method="GET" action={{route('files.grade.student')}}>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year</label>
                            <select
                                id="search"
                                name="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                            >
                                @foreach($userAcademyYear as $dataAcademyYear )
                                    <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester</label>
                            <select
                                id="searchSemester"
                                name="searchSemester"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                            >
                                @foreach($userSemester as $dataSemester )
                                    <option value={{$dataSemester->id}}>{{$dataSemester->name_semester}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button target="_blank" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >File PDF</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection




