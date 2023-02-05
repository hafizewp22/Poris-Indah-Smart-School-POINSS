@extends('layouts.app')

@section('content')
    <style>
        /* Tab content - closed */
        .tab-content {
            max-height: 0;
            -webkit-transition: max-height .35s;
            -o-transition: max-height .35s;
            transition: max-height .35s;
        }
        /* :checked - resize to full height */
        .tab input:checked ~ .tab-content {
            max-height: 100vh;
        }
        /* Icon */
        .tab label::after {
            float:right;
            right: 0;
            top: 0;
            display: block;
            width: 1.5em;
            height: 1.5em;
            line-height: 1.5;
            font-size: 1.25rem;
            text-align: center;
            -webkit-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }
        /* Icon formatting - closed */
        .tab input[type=checkbox] + label::after {
            content: "+";
            font-weight:bold; /*.font-bold*/
            border-width: 1px; /*.border*/
            border-radius: 9999px; /*.rounded-full */
            border-color: #b8c2cc; /*.border-grey*/
        }
        .tab input[type=radio] + label::after {
            content: "\25BE";
            font-weight:bold; /*.font-bold*/
            border-width: 1px; /*.border*/
            border-radius: 9999px; /*.rounded-full */
            border-color: #464867; /*.border-grey*/
        }
        /* Icon formatting - open */
        .tab input[type=checkbox]:checked + label::after {
            transform: rotate(315deg);
            background-color: #ffffff; /*.bg-indigo*/
            color: #464867; /*.text-grey-lightest*/
        }
        .tab input[type=radio]:checked + label::after {
            transform: rotateX(180deg);
            background-color: #ffffff; /*.bg-indigo*/
            color: #464867; /*.text-grey-lightest*/
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Schedule</h3>
    </div>

    <div>
        <form class="flex" method="GET" action={{route('search.student.schedule')}}>
            <div class="flex">
                <div class="flex flex-wrap place-items-center ">
                    <div class="md:w-40 px-3" >
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                            Academic Year
                        </label>
                    </div>
                    <div class="md:w-48 px-3">
                        <select
                            id="searchAy"
                            name="searchAy"
                            class="form-control appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            @foreach($userAcademyYear as $dataAcademyYear )
                                <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap place-items-center ">
                    <div class=" md:w-24 px-3" >
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                            Semester
                        </label>
                    </div>
                    <div class="md:w-48 px-3">
                        <select
                            id="searchSemester"
                            name="searchSemester"
                            class="form-control appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            @foreach($userSemester as $dataSemester )
                                <option value={{$dataSemester->id}}>{{$dataSemester->name_semester}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="md:w-48 px-3">
                    <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none">View</button>
                </div>
            </div>
        </form>

        <div class="pt-1 pb-6 lg:h-96 xl:h-[27rem] overflow-y-scroll scrollbar ">
            <div class="shadow-md">

                <div class="tab mt-3 w-full rounded-lg overflow-hidden border-t bg-[#464867] hover:bg-[#464867] text-white">
                    <input class="absolute opacity-0" id="tab-single-one" type="radio" name="tabs2">
                    <label class="block p-4 leading-normal cursor-pointer" for="tab-single-one">Monday</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal text-black">
                        <div class="p-2">
                            <div class="overflow-x-auto relative">
                                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                                    @forelse($scheduleMonday as $data)
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->name_subject}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->time_start}} - {{$data->time_off}} WIB
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }}) / {{$data->semesters->name_semester}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->teachers->name}}
                                            </th>
                                        </tr>
                                    @empty
                                        <tr class="overflow-x-auto relative">
                                            <th scope="col" class="py-3 px-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <h1 class="text-center">No class schedule yet.</h1>
                                            </th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab mt-3 w-full rounded-lg overflow-hidden border-t bg-[#464867] hover:bg-[#464867] text-white">
                    <input class="absolute opacity-0" id="tab-single-two" type="radio" name="tabs2">
                    <label class="block p-4 leading-normal cursor-pointer" for="tab-single-two">Tuesday</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal text-black">
                        <div class="p-2">
                            <div class="overflow-x-auto relative">
                                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                                    @forelse($scheduleTuesday as $data)
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->name_subject}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->time_start}} - {{$data->time_off}} WIB
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }}) / {{$data->semesters->name_semester}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->teachers->name}}
                                            </th>
                                        </tr>
                                    @empty
                                        <tr class="overflow-x-auto relative">
                                            <th scope="col" class="py-3 px-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <h1 class="text-center">No class schedule yet.</h1>
                                            </th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab mt-3 w-full rounded-lg overflow-hidden border-t bg-[#464867] hover:bg-[#464867] text-white">
                    <input class="absolute opacity-0" id="tab-single-three" type="radio" name="tabs2">
                    <label class="block p-4 leading-normal cursor-pointer" for="tab-single-three">Wednesday</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal text-black">
                        <div class="p-2">
                            <div class="overflow-x-auto relative">
                                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                                    @forelse($scheduleWednesday as $data)
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->name_subject}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->time_start}} - {{$data->time_off}} WIB
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }}) / {{$data->semesters->name_semester}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->teachers->name}}
                                            </th>
                                        </tr>
                                    @empty
                                        <tr class="overflow-x-auto relative">
                                            <th scope="col" class="py-3 px-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <h1 class="text-center">No class schedule yet.</h1>
                                            </th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab mt-3 w-full rounded-lg overflow-hidden border-t bg-[#464867] hover:bg-[#464867] text-white">
                    <input class="absolute opacity-0" id="tab-single-four" type="radio" name="tabs2">
                    <label class="block p-4 leading-normal cursor-pointer" for="tab-single-four">Thursday</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal text-black">
                        <div class="p-2">
                            <div class="overflow-x-auto relative">
                                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                                    @forelse($scheduleThursday as $data)
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->name_subject}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->time_start}} - {{$data->time_off}} WIB
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }}) / {{$data->semesters->name_semester}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->teachers->name}}
                                            </th>
                                        </tr>
                                    @empty
                                        <tr class="overflow-x-auto relative">
                                            <th scope="col" class="py-3 px-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <h1 class="text-center">No class schedule yet.</h1>
                                            </th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab mt-3 w-full rounded-lg overflow-hidden border-t bg-[#464867] hover:bg-[#464867] text-white">
                    <input class="absolute opacity-0" id="tab-single-five" type="radio" name="tabs2">
                    <label class="block p-4 leading-normal cursor-pointer" for="tab-single-five">Friday</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal text-black">
                        <div class="p-2">
                            <div class="overflow-x-auto relative">
                                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                                    @forelse($scheduleFriday as $data)
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->name_subject}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->time_start}} - {{$data->time_off}} WIB
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }}) / {{$data->semesters->name_semester}}
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                {{$data->subjects->teachers->name}}
                                            </th>
                                        </tr>
                                    @empty
                                        <tr class="overflow-x-auto relative">
                                            <th scope="col" class="py-3 px-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <h1 class="text-center">No class schedule yet.</h1>
                                            </th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        /* Optional Javascript to close the radio button version by clicking it again */
        var myRadios = document.getElementsByName('tabs2');
        var setCheck;
        var x = 0;
        for(x = 0; x < myRadios.length; x++){
            myRadios[x].onclick = function(){
                if(setCheck != this){
                    setCheck = this;
                }else{
                    this.checked = false;
                    setCheck = null;
                }
            };
        }
    </script>
@endsection




