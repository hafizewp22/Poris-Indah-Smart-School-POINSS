@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Point Student</h3>
    </div>

    <div>
        <div class="w-full  border shadow-md  ">

            <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg divide-x divide-gray-200 sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full">
                    <button id="violation-tab" data-tabs-target="#violation" type="button" role="tab" aria-controls="violation" aria-selected="true" class="inline-block p-4 w-full bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Violation</button>
                </li>
                <li class="w-full">
                    <button id="award-tab" data-tabs-target="#award" type="button" role="tab" aria-controls="award" aria-selected="false" class="inline-block p-4 w-full bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Award</button>
                </li>
            </ul>

            <div id="defaultTabContent" class="">
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-[30rem]"  id="violation" role="tabpanel" aria-labelledby="award-tab">
                {{--                    <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal-violation">Add Student Violation Points</button>--}}
                <!-- List -->
                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-96 overflow-y-scroll scrollbar">
                        <div id='recipients' class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table id="example1" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                        Violation
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Point
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Name Input
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($PSViolations as $data)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$no++}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$data->points->students->username}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->points->students->name}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->violation}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ date('d M Y', strtotime($data->date)) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            -{{$data->point}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->teachers->name}}
                                        </td>
                                        <td class="py-4 px-6">
                                            <a data-modal-toggle="popup-modal-{{route('model.delete.point.violation', $data->id)}}" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>

                                    <div id="popup-modal-{{route('model.delete.point.violation', $data->id)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this data student violation?</h3>
                                                    <a  href="{{ route('delete.point.violation', $data->id) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Yes, I'm sure
                                                    </a>
                                                    <button data-modal-toggle="popup-modal-{{route('model.delete.point.violation', $data->id)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </ul>
                </div>


                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-[30rem]" id="award" role="tabpanel" aria-labelledby="award-tab">
                {{--                    <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal-award">Add Student Award Points</button>--}}
                <!-- List -->
                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-96 overflow-y-scroll scrollbar">
                        <div id='recipient1' class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                        Award
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Point
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Name Input
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($PSAwards as $data)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$no++}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$data->points->students->username}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->points->students->name}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->award}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ date('d M Y', strtotime($data->date)) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->point}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->teachers->name}}
                                        </td>
                                        <td class="py-4 px-6">
                                            <a data-modal-toggle="popup-modal-{{route('model.delete.point.awards', $data->id)}}" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>

                                    <div id="popup-modal-{{route('model.delete.point.awards', $data->id)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this data student awards?</h3>
                                                    <a  href="{{ route('delete.point.awards', $data->id) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Yes, I'm sure
                                                    </a>
                                                    <button data-modal-toggle="popup-modal-{{route('model.delete.point.awards', $data->id)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal Add Student Violation Points-->
    {{--    <div id="add-modal-violation" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">--}}
    {{--        <div class="relative p-4 w-full max-w-md h-full md:h-auto">--}}
    {{--            <!-- Modal content -->--}}
    {{--            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
    {{--                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal-violation">--}}
    {{--                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
    {{--                    <span class="sr-only">Close modal</span>--}}
    {{--                </button>--}}
    {{--                <div class="py-6 px-6 lg:px-8">--}}
    {{--                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Student Violation Points</h3>--}}
    {{--                    <form class="space-y-6" method="POST" action="{{route('add.point.violation')}}">--}}
    {{--                        @csrf--}}
    {{--                        <div>--}}
    {{--                            <label for="id_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Student <span class="text-danger">*</span></label>--}}
    {{--                            <select--}}
    {{--                                id="id_student"--}}
    {{--                                name="id_student"--}}
    {{--                                required--}}
    {{--                                autocomplete="id_student"--}}
    {{--                                value="{{ old('id_student') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_student') is-invalid @enderror"--}}
    {{--                            >--}}
    {{--                                <option selected="" disabled="">Select Student</option>--}}
    {{--                                @foreach($userStudent as $dataStudent)--}}
    {{--                                    @if($dataStudent->user_type == '0')--}}
    {{--                                        <option value={{$dataStudent->id}}>{{$dataStudent->name}}</option>--}}
    {{--                                    @endif--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}

    {{--                            @error('id_student')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="name_ps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Point <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="text"--}}
    {{--                                id="name_ps"--}}
    {{--                                name="name_ps"--}}
    {{--                                required--}}
    {{--                                placeholder="Name Point"--}}
    {{--                                autocomplete="name_ps"--}}
    {{--                                value="{{ old('name_ps') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_ps') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('name_ps')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="violation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Violation <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="text"--}}
    {{--                                id="violation"--}}
    {{--                                name="violation"--}}
    {{--                                required--}}
    {{--                                placeholder="Violation"--}}
    {{--                                autocomplete="violation"--}}
    {{--                                value="{{ old('violation') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('violation') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('violation')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="text"--}}
    {{--                                id="date"--}}
    {{--                                name="date"--}}
    {{--                                required--}}
    {{--                                placeholder="Date"--}}
    {{--                                autocomplete="date"--}}
    {{--                                value="{{ old('date') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('date') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('date')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="point" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Point <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="number"--}}
    {{--                                id="point"--}}
    {{--                                name="point"--}}
    {{--                                required--}}
    {{--                                placeholder="Point"--}}
    {{--                                autocomplete="point"--}}
    {{--                                value="{{ old('point') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('point') is-invalid @enderror"--}}
    {{--                            >--}}
    {{--                            <span><span class="text-danger">*</span> No need to type minus (-) in front of numbers</span>--}}

    {{--                            @error('point')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Add Data" >--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <!-- Main modal Add Student  Award  Points-->--}}
    {{--    <div id="add-modal-award" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">--}}
    {{--        <div class="relative p-4 w-full max-w-md h-full md:h-auto">--}}
    {{--            <!-- Modal content -->--}}
    {{--            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">--}}
    {{--                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal-award">--}}
    {{--                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>--}}
    {{--                    <span class="sr-only">Close modal</span>--}}
    {{--                </button>--}}
    {{--                <div class="py-6 px-6 lg:px-8">--}}
    {{--                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Student Award Points</h3>--}}
    {{--                    <form class="space-y-6" method="POST" action="{{route('add.point.awards')}}">--}}
    {{--                        @csrf--}}
    {{--                        <div>--}}
    {{--                            <label for="id_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Student <span class="text-danger">*</span></label>--}}
    {{--                            <select--}}
    {{--                                id="id_student"--}}
    {{--                                name="id_student"--}}
    {{--                                required--}}
    {{--                                autocomplete="id_student"--}}
    {{--                                value="{{ old('id_student') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_student') is-invalid @enderror"--}}
    {{--                            >--}}
    {{--                                <option selected="" disabled="">Select Student</option>--}}
    {{--                                @foreach($userStudent as $dataStudent)--}}
    {{--                                    @if($dataStudent->user_type == '0')--}}
    {{--                                        <option value={{$dataStudent->id}}>{{$dataStudent->name}}</option>--}}
    {{--                                    @endif--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}

    {{--                            @error('id_student')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="name_ps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Point <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="text"--}}
    {{--                                id="name_ps"--}}
    {{--                                name="name_ps"--}}
    {{--                                required--}}
    {{--                                placeholder="Name Point"--}}
    {{--                                autocomplete="name_ps"--}}
    {{--                                value="{{ old('name_ps') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('name_ps') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('name_ps')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="violation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Award <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="text"--}}
    {{--                                id="award"--}}
    {{--                                name="award"--}}
    {{--                                required--}}
    {{--                                placeholder="Award"--}}
    {{--                                autocomplete="award"--}}
    {{--                                value="{{ old('award') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('award') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('violation')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="date"--}}
    {{--                                id="date"--}}
    {{--                                name="date"--}}
    {{--                                required--}}
    {{--                                placeholder="Date"--}}
    {{--                                autocomplete="date"--}}
    {{--                                value="{{ old('date') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('date') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('date')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <label for="point" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Point <span class="text-danger">*</span></label>--}}
    {{--                            <input--}}
    {{--                                type="number"--}}
    {{--                                id="point"--}}
    {{--                                name="point"--}}
    {{--                                required--}}
    {{--                                placeholder="Point"--}}
    {{--                                autocomplete="point"--}}
    {{--                                value="{{ old('point') }}"--}}
    {{--                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('point') is-invalid @enderror"--}}
    {{--                            >--}}

    {{--                            @error('point')--}}
    {{--                            <span class="invalid-feedback" role="alert">--}}
    {{--                                <strong>{{ $message }}</strong>--}}
    {{--                            </span>--}}
    {{--                            @enderror--}}
    {{--                        </div>--}}

    {{--                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Add Data" >--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


@endsection
