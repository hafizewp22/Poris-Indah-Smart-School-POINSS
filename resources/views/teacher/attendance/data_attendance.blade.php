@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Attendance Information</h3>
    </div>

    <form class="flex" method="GET" action="{{route('search.teacher.attendance')}}">
        <div class="flex">
            <div class="flex flex-wrap place-items-center ">
                <div class="md:w-40 px-3" >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                        Subject / Class
                    </label>
                </div>
                <div class="md:w-auto px-3">
                    <select
                        id="SearchSubject"
                        name="SearchSubject"
                        class="form-control appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        @foreach($userSubject as $dataSubject )
                            <option value={{$dataSubject->id_sub}}>{{$dataSubject->name_subject}} - {{$dataSubject->classs->name_class}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="md:w-48 px-3">
                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none">View</button>
            </div>
        </div>
        <div class="md:w-64 px-3">
            <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none" type="button" data-modal-toggle="add-modal">Add Attendance</button>
        </div>
    </form>

    <div>
        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">
            <div>
                <h1 class="text-xl font-bold py-2.5 mb-2">Today Class</h1>
                <ul role="list">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Subject
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Class
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Date
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Time
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Total Students
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($dataAttendanceInput as $data)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->subjects->name_subject}}
                                </th>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->classs->name_class}}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ date('d M Y', strtotime($data->date)) }}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->schedules->time_start}} - {{$data->subjects->schedules->time_off}} WIB
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->classs->classs->count()}}
                                </td>
                                <td class="py-2 px-3 flex text-gray-900 dark:text-white">
                                    <a href="{{route('view.teacher.attendance', $data->id_atte)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 mr-2" type="button">Start</a>
                                    <a data-modal-toggle="popup-modal-{{route('model.delete.attendance', $data->id_atte)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button">Cancel</a>
                                </td>
                            </tr>

                            <div id="popup-modal-{{route('model.delete.attendance', $data->id_atte)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to cancel this attendance?</h3>
                                            <a  href="{{ route('delete.attendance', $data->id_atte) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                Yes, I'm sure
                                            </a>
                                            <button data-modal-toggle="popup-modal-{{route('model.delete.attendance', $data->id_atte)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <tr colspan = "6" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        No Data
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </ul>
            </div>

            <div>
                <h1 class="text-xl font-bold py-2.5 mb-2">Done Attendance</h1>
                <ul role="list">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Subject
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Class
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Date
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Time
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Total Attendance
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($dataAttendanceOutput as $data)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$data->subjects->name_subject}}
                                </th>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->classs->name_class}}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ date('d M Y', strtotime($data->date)) }}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->schedules->time_start}} - {{$data->subjects->schedules->time_off}} WIB
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->classs->classs->count()}}
                                </td>
                                <td class="py-4 px-6 flex dark:text-white">
                                    <div class="mr-5 text-green-700">
                                        Done
                                    </div>
                                    <a href="{{route('detail.teacher.attendance', $data->id_atte)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr colspan = "6" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        No Data
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </ul>
            </div>

        </div>
    </div>

    <!-- Main modal Add Class-->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Attendance Information</h3>
                    <form class="space-y-6" method="POST" action="{{route('add.teacher.attendance')}}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date <span class="text-danger">*</span></label>
                            <input
                                type="date"
                                name="date"
                                id="date"
                                autocomplete="date"
                                value="{{ old('date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('date') is-invalid @enderror"
                                required
                            >

                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject <span class="text-danger">*</span></label>
                            <select
                                name="id_subject"
                                id="id_subject"
                                autocomplete="id_subject"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Subject</option>
                                @foreach($userSubject as $data)
                                    <option value="{{$data->id_sub}}">{{$data->name_subject}}</option>
                                @endforeach
                            </select>

                            @error('id_subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time Start <span class="text-danger">*</span></label>
                            <select
                                name="time"
                                id="time"
                                autocomplete="time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('time') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Time</option>
                                @foreach($userSchedule as $dataSchedule)
                                    <option value="{{$dataSchedule->id_sch}}">{{$dataSchedule->time_start}} - {{$dataSchedule->time_off}} WIB</option>
                                @endforeach
                            </select>

                            @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Done" >
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection




