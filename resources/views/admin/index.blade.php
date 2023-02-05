@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Welcome to {{Auth::user()->name}}</h3>
    </div>

    <div>
        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">
            <h1 class="text-xl py-2 px-2 font-bold">Data:</h1>
            <div class="overflow-x-auto relative">
                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                        <tr>
                            <th scope="col" class="text-6xl text-center text-[#0028FB] py-3 px-6">
                                {{ number_format($userStudent) }}
                            </th>
                            <th scope="col" class="text-6xl text-center text-[#FFB800] py-3 px-6">
                                {{ number_format($userTeacher) }}
                            </th>
                            <th scope="col" class="text-6xl text-center text-[#FF0000] py-3 px-6">
                                {{ number_format($users) }}
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-2xl text-center py-3 px-6">
                                Students
                            </th>
                            <th scope="col" class="text-2xl text-center py-3 px-6">
                                Teachers
                            </th>
                            <th scope="col" class="text-2xl text-center py-3 px-6">
                                Number of Users
                            </th>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>



@endsection




