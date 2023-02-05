@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <a href="{{url('teacher/data-grade')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Grade</h3>
    </div>

    <div class="flex ml-14">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{$userGrades->subjects->classs->name_class}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{$userGrades->subjects->name_subject}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">Min Score: {{$userGrades->min_score}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{$userGrades->academicYear->name_academic_year}} - {{$userGrades->semesters->name_semester}}</h1>
        </div>
    </div>

    {{--    @if($userGrades->done == '0')--}}
    {{--        <a href="{{route('add.view.grade', $userGrades->id_grade)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 mt-3" type="button" >Add Grade</a>--}}
    {{--    @else--}}
    {{--        <a href="{{route('edit.view.grade', $userGrades->id_grade)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 mt-3" type="button" >Edit Grade</a>--}}
    {{--    @endif--}}

    <div class="pt-6 pb-6 lg:h-96 xl:h-[34rem] overflow-y-scroll scrollbar">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        No
                    </th>
                    <th scope="col" class="py-3 px-6">
                        NISN
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name Student
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Min Score
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Quiz
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Assignment
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Daily Tests
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Mid Exam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Final Exam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total
                    </th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp

                @if($userGrades->done == '1')
                    <button class="box-border h-12 w-64 p-2 rounded-lg bg-[#FFAA06]">
                        <a href="{{route('file.final.view.teacher.grade', $userGrades->id_grade)}}" class="flex" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                            </svg>
                            <h1 class="ml-2 text-xl text-white font-bold">Download Grade</h1>
                        </a>
                    </button>
                    <h1 class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Final Grade Data for this class has been entered.</h1>
                    @forelse($subjectAfter as $data)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$no++}}
                            </th>
                            <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                {{$data->username}}
                            </th>
                            <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                {{$data->name}}
                            </th>
                            <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                {{$data->min_score}}
                            </th>

                            @if($data->quiz < $data->min_score)
                                <th scope="row" class="py-4 px-6 text-red-700 dark:text-white">
                                    {{$data->quiz}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->quiz}}
                                </th>
                            @endif

                            @if($data->assignment < $data->min_score)
                                <th scope="row" class="py-4 px-6 text-red-700 dark:text-white">
                                    {{$data->assignment}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->assignment}}
                                </th>
                            @endif

                            @if($data->d_t < $data->min_score)
                                <th scope="row" class="py-4 px-6 text-red-700 dark:text-white">
                                    {{$data->d_t}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->d_t}}
                                </th>
                            @endif

                            @if($data->min_text < $data->min_score)
                                <th scope="row" class="py-4 px-6 text-red-700 dark:text-white">
                                    {{$data->min_text}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->min_text}}
                                </th>
                            @endif

                            @if($data->final_text < $data->min_score)
                                <th scope="row" class="py-4 px-6 text-red-700 dark:text-white">
                                    {{$data->final_text}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->final_text}}
                                </th>
                            @endif

                            @if($data->total < $data->min_score)
                                <th scope="row" class="py-4 px-6 text-red-700 dark:text-white">
                                    {{$data->total}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->total}}
                                </th>
                            @endif
                        </tr>
                    @empty
                        <tr colspan = "10" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Data
                            </td>
                        </tr>
                    @endforelse

                @else
                    <h1 class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Final grades for this class have not been entered.</h1>
                    @forelse($subjectBefore as $data)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$no++}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->username}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->name}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                {{$data->min_score}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                Not yet in
                            </th>
                        </tr>
                    @empty
                        <tr colspan = "10" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Data
                            </td>
                        </tr><tbody>
                @php $no = 1; @endphp

                @if($userGrades->done == '1')
                    <h1 class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Mid Exam Data for this class has been entered.</h1>
                    @forelse($subjectAfter as $data)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$no++}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->username}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->name}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                {{$data->min_score}}
                            </th>

                            @if($data->quiz < $data->min_score)
                                <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                    {{$data->quiz}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->quiz}}
                                </th>
                            @endif

                            @if($data->assignment < $data->min_score)
                                <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                    {{$data->assignment}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->assignment}}
                                </th>
                            @endif

                            @if($data->d_t < $data->min_score)
                                <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                    {{$data->d_t}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->d_t}}
                                </th>
                            @endif

                            @if($data->min_text < $data->min_score)
                                <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                    {{$data->min_text}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->min_text}}
                                </th>
                            @endif

                            @if($data->final_text < $data->min_score)
                                <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                    {{$data->final_text}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->final_text}}
                                </th>
                            @endif

                            @if($data->total < $data->min_score)
                                <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                    {{$data->total}}
                                </th>
                            @else
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->total}}
                                </th>
                            @endif
                        </tr>
                    @empty
                        <tr colspan = "10" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Data
                            </td>
                        </tr>
                    @endforelse

                @else
                    <h1 class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Mid Exam Data for this class has not been entered..</h1>
                    @forelse($subjectBefore as $data)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$no++}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->username}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$data->name}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                {{$data->min_score}}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                0
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                Not yet in
                            </th>
                        </tr>
                    @empty
                        <tr colspan = "10" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No Data
                            </td>
                        </tr>
                    @endforelse
                @endif

                </tbody>
                @endforelse
                @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection




