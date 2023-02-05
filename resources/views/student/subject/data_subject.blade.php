@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Subject</h3>
    </div>

    <div>
        <form class="flex justify-between" method="GET" action="{{route('search.student.subject')}}">
            <div class="flex">
                <div class="flex flex-wrap place-items-center ">
                    <div class="md:w-40 px-3" >
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                            Class
                        </label>
                    </div>
                    <div class="md:w-48 px-3">
                        <select
                            id="searchClass"
                            name="searchClass"
                            class="form-control appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
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
                            <h1 class=" text-bold">{{$data->teachers->name}}</h1>
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
                            <a href="{{route('view.class.student.subject', $data->id_sub)}}" class="place-items-center space-x-4 focus:outline-none text-black-50 bg-white hover:bg-white font-medium rounded-lg text-sm px-3 py-2.5 space-x-4 " >View</a>
                            <a href="{{route('view.class.student.subject.student', $data->id_sub)}}" class="place-items-center space-x-4 focus:outline-none text-black-50 bg-white hover:bg-white font-medium rounded-lg text-sm px-3 py-2.5 space-x-4 " >Data Student</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection




