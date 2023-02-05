@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Grade</h3>
    </div>

    <form class="flex" method="GET" action="{{route('search.teacher.student')}}">
        <div class="flex">
            <div class="flex flex-wrap place-items-center ">
                <div class=" md:w-40 px-3" >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                        Academic Year
                    </label>
                </div>
                <div class=" md:w-64 px-3 ">
                    <select
                        id="academyYear"
                        name="academyYear"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    >
                        @foreach($userAcademyYear as $dataAcademyYear )
                            <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex">
                <div class="flex flex-wrap place-items-center ">
                    <div class=" md:w-40 px-3" >
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                            Semester
                        </label>
                    </div>
                    <div class=" md:w-64 px-3 ">
                        <select
                            id="semester"
                            name="semester"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        >
                            @foreach($userSemester as $dataSemester )
                                <option value={{$dataSemester->id}}>{{$dataSemester->name_semester}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="md:w-64 px-3">
                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none">View</button>
            </div>
        </div>
    </form>

    <div>
        <div class="w-full  border shadow-md mt-3">
            <ul class="flex flex-wrap text-sm font-medium text-center  rounded-t-lg border-b  dark:text-gray-400 dark:bg-gray-800 justify-center" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="mr-2">
                    <button id="grade-tab" data-tabs-target="#grade" type="button" role="tab" aria-controls="grade" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500 hover:text-blue-600 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500">Grade Report</button>
                </li>
                <li class="mr-2">
                    <button id="quiz-tab" data-tabs-target="#quiz" type="button" role="tab" aria-controls="quiz" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700">Middle Semester Report</button>
                </li>
                <li class="mr-2">
                    <button id="final-tab" data-tabs-target="#final" type="button" role="tab" aria-controls="final" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700">Final Semester Report</button>
                </li>
            </ul>

            <div id="defaultTabContent" class="">

                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-[29rem]"  id="grade" role="tabpanel" aria-labelledby="grade-tab">
                    <!-- List -->
                    @include('teacher.grade.home.index')
                </div>

                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-[29rem]" id="quiz" role="tabpanel" aria-labelledby="final-tab">
                    <!-- List -->
                    @include('teacher.grade.middle.index')
                </div>

                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-[29rem]" id="final" role="tabpanel" aria-labelledby="final-tab">
                    <!-- List -->
                    @include('teacher.grade.final.index')
                </div>
            </div>
        </div>
    </div>
@endsection




