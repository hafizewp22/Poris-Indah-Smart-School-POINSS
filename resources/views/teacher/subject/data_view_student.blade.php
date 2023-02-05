@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <a href="{{url('teacher/data-subject')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">View Student : {{ $dataSubject->name_subject}} / {{$dataSubject->classs->name_class}}</h3>
    </div>

    <div class="flex ml-14">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $dataSubject->teachers->name}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $dataSubject->subjectType->subject_type }}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $dataSubject->classs->name_class }}</h1>
        </div>
    </div>

    <div class="pt-6 pb-6 lg:h-96 xl:h-[34rem] overflow-y-scroll scrollbar">
        <div class="px-5 py-2.5 mb-2 mt-6 text-xl text-justify">
            {{ $dataSubject->detail_material }}
        </div>

        <div class="grid grid-cols-1 divide-y">
            <div class="mt-6 focus:outline-none text-black bg-[#EDEDED] hover:bg-[#EDEDED] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">
                <h1 class="text-xl font-bold">Textbook:</h1>
                <h1 class=" text-lg ">{{$dataSubject->text_book}}</h1>
            </div>

            <div>
                <h1 class="text-xl font-bold px-5 py-2.5 mb-2">Data Students:</h1>
                <section>
                    <div class="container mx-auto">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <!--Card-->
                                <div id='recipients' class="p-8 rounded shadow bg-white">
                                    <table id="example1" class="w-full table-auto">
                                        <thead>
                                        <tr class="bg-[#464867] text-center">
                                            <th class="w-24 min-w-[160px] py-2 px-4 text-lg font-semibold text-white">
                                                No
                                            </th>
                                            <th class="w-2/5 min-w-[160px]  text-lg font-semibold text-white"
                                            >
                                                Name Student
                                            </th>
                                            <th class="w-1/3 min-w-[160px] text-lg font-semibold text-white ">
                                                NISN
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @php $no = 1; @endphp

                                        @foreach($viewSubject as $data)
                                            <tr>
                                                <td class="text-dark border-b border-l border-[#E8E8E8]  py-2 px-4 text-center text-base font-medium"
                                                >
                                                    {{ $no++ }}
                                                </td>
                                                <td class="text-dark border-b border-[#E8E8E8] bg-white text-center text-base font-medium"
                                                >
                                                    {{ $data->name}}
                                                </td>
                                                <td class="text-dark border-b border-[#E8E8E8] text-center text-base font-medium"
                                                >
                                                    {{ $data->username}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--/Card-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
