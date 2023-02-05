@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Attendance Information</h3>
    </div>

    <form class="flex" method="GET" action="{{route('search.student.attendance')}}">
        <div class="flex">
            <div class="flex flex-wrap place-items-center ">
                <div class="md:w-40 px-3" >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                        Subject
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
    </form>

    <div>
        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">
            <div>
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
                                    Present (Hadir)
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Permit (Izin)
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Sick (Sakit)
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Absent (Alpa)
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($userAttendances as $data)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                        {{$data->name_subject}}
                                    </th>
                                    <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                        {{$data->classs->name_class}}
                                    </th>
                                    <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                        @if(!empty($data->attendances))
                                            {{$data->attendances->attendancesInPresent()}}
                                        @else
                                            0
                                        @endif
                                    </th>
                                    <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                        @if(!empty($data->attendances))
                                            {{$data->attendances->attendancesInPermit()}}
                                        @else
                                            0
                                        @endif
                                    </th>
                                    <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                        @if(!empty($data->attendances))
                                            {{$data->attendances->attendancesInSick()}}
                                        @else
                                            0
                                        @endif
                                    </th>
                                    <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                        @if(!empty($data->attendances))
                                            {{$data->attendances->attendancesInAbsent()}}
                                        @else
                                            0
                                        @endif
                                    </th>
                                    @if(!empty($data->attendances))
                                        <th class="py-2 px-3 flex text-gray-900 dark:text-white">
                                            <a href="{{route('view.student.attendance', $data->attendances->id_subject)}}"  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">View</a>
                                        </th>
                                    @else
                                        <th class="py-4 px-6 flex text-red-700 dark:text-white">
                                            No Attendance yet
                                        </th>
                                    @endif
                                </tr>
                                @empty
                                    <tr colspan = "7" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
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

@endsection




