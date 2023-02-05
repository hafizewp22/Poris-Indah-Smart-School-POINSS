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
                    <!-- List -->
                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-96 overflow-y-scroll scrollbar">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
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
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                <div class="mb-3">
                                    <h1 class="font-bold text-right text-xl flex">
                                        <div class="p-2.5">Point:</div>
                                        <div class="bg-gray-50 p-2.5">
                                            -{{$dataViolations->sum('point')}}
                                        </div>
                                    </h1>
                                </div>
                                @forelse($dataViolations as $data)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$no++}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$data->violation}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ date('d M Y', strtotime($data->date)) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            -{{$data->point}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th colspan = "4" scope="row" class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            No Data
                                        </th>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </ul>
                </div>


                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-[30rem]" id="award" role="tabpanel" aria-labelledby="award-tab">
                    <!-- List -->
                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-96 overflow-y-scroll scrollbar">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
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
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp

                                <div class="mb-3">
                                    <h1 class="font-bold text-right text-xl flex">
                                        <div class="p-2.5">Point:</div>
                                        <div class="bg-gray-50 p-2.5">
                                            {{$dataAwards->sum('point')}}
                                        </div>
                                    </h1>
                                </div>
                                @forelse($dataAwards as $data)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$no++}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$data->award}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ date('d M Y', strtotime($data->date)) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$data->point}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                        <th colspan = "4" scope="row" class="text-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            No Data
                                        </th>

                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
