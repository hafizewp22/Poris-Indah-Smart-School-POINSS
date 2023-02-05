@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Grade</h3>
    </div>

    <form  class="flex" method="GET" action={{route('search.grade.student')}}>
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
        @include('student.grade.view_grade')
    </div>
@endsection




