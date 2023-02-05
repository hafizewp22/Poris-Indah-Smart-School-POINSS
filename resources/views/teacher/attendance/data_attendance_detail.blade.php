@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <a href="{{url('teacher/data-attendance')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Attendance</h3>
    </div>

    <div class="flex ml-14">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $dataAttendanceDe->subjects->teachers->name}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $dataAttendanceDe->subjects->subjectType->subject_type }}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $dataAttendanceDe->subjects->name_subject}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl"> {{ date('d M Y', strtotime($dataAttendanceDe->date)) }} ({{ $dataAttendanceDe->subjects->schedules->time_start}} - {{$dataAttendanceDe->subjects->schedules->time_off}} WIB)</h1>
        </div>
    </div>

    <div class="pt-6 pb-6 lg:h-96 xl:h-[34rem] overflow-y-scroll scrollbar">
        <div>
            <ul role="list">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <form method="POST" action="{{route('add.teacher.attendance.detail')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_atte" value="{{ $dataAttendance->id_atte }}">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    NISN
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Attendance
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Note (Option)
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataAttendanceTa as $data)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$data->username}}
                                        <input
                                            type="hidden"
                                            name="id_atte[]"
                                            id="id_atte"
                                            value="{{$data->id_atte}}"
                                        >
                                        <input
                                            type="hidden"
                                            name="id_student[]"
                                            id="id_student"
                                            value="{{$data->id}}"
                                        >
                                    </th>
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$data->name}}
                                    </td>
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <select
                                            id="id_atte_type"
                                            name="id_atte_type[]"
                                            required
                                            autocomplete="id_atte_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        >
                                            <option value="2">Present (Hadir)</option>
                                            <option value="4">Permit (Izin)</option>
                                            <option value="1">Sick (Sakit)</option>
                                            <option value="3">Absent (Alpa)</option>

                                        </select>
                                    </td>
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input
                                            type="text"
                                            name="note[]"
                                            id="note"
                                            autocomplete="note"
                                            value="{{ old('note') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        >
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <input type="submit" class="mt-3 mb-3 focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " value="Done" >
                    </form>
                </div>
            </ul>
        </div>
    </div>
@endsection
