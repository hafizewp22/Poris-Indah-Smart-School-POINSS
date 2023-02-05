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
        <div>
            <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button" data-modal-toggle="add-modal">Add Schedule</button>
        </div>

        <form class="flex" method="GET" action={{route('search.schedule')}}>
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
                                            <th scope="col" class="py-3 px-6">
                                                <div class="flex flex-wrap place-items-center space-x-4 ">
                                                    <a type="button" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="{{route('edit.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="{{route('view.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button">Information</a>
                                                </div>
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
                                            <th scope="col" class="py-3 px-6">
                                                <div class="flex flex-wrap place-items-center space-x-4 ">
                                                    <a type="button" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="{{route('edit.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="{{route('view.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button">Information</a>
                                                </div>
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
                                            <th scope="col" class="py-3 px-6">
                                                <div class="flex flex-wrap place-items-center space-x-4 ">
                                                    <a type="button" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="{{route('edit.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="{{route('view.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button">Information</a>
                                                </div>
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
                                            <th scope="col" class="py-3 px-6">
                                                <div class="flex flex-wrap place-items-center space-x-4 ">
                                                    <a type="button" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="{{route('edit.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="{{route('view.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button">Information</a>
                                                </div>
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
                                            <th scope="col" class="py-3 px-6">
                                                <div class="flex flex-wrap place-items-center space-x-4 ">
                                                    <a type="button" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="{{route('edit.schedule', $data->id_sch)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="{{route('view.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button">Information</a>
                                                </div>
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

    <!-- Main modal Add -->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Schedule</h3>
                    <form class="space-y-6" method="POST" action="{{route('add.schedule')}}">
                        @csrf
                        <div>
                            <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year <span class="text-danger">*</span></label>
                            <select
                                name="id_academic_year"
                                id="id_academic_year"
                                autocomplete="id_academic_year"
                                value="{{ old('id_academic_year') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Academic Year</option>
                                @foreach($userAY as $dataAY)
                                    <option value={{$dataAY->id}}>{{$dataAY->name_academic_year}}</option>
                                @endforeach
                            </select>

                            @error('id_class')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Day Class<span class="text-danger">*</span></label>
                            <select
                                name="day"
                                id="day"
                                autocomplete="day"
                                value="{{ old('day') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Day Class</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>

                            </select>

                            @error('day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="time_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time Start Class<span class="text-danger">*</span></label>
                            <input
                                type="time"
                                name="time_start"
                                id="time_start"
                                autocomplete="time_start"
                                value="{{ old('time_start') }}"
                                pattern="[0-9]{2}:[0-9]{2}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('time_start') is-invalid @enderror"
                                required
                            >

                            @error('time_start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="time_off" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time End Class<span class="text-danger">*</span></label>
                            <input
                                type="time"
                                name="time_off"
                                id="time_off"
                                autocomplete="time_off"
                                value="{{ old('time_off') }}"
                                pattern="[0-9]{2}:[0-9]{2}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('time_off') is-invalid @enderror"
                                required
                            >

                            @error('time_off')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_subject" class="id_subject block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject <span class="text-danger">*</span></label>
                            <select
                                name="id_subject"
                                id="id_subject"
                                autocomplete="id_subject"
                                value="{{ old('id_subject') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Subject</option>
                                @foreach($userSubject as $dataSubject)
                                    <option value={{$dataSubject->id_sub}}>{{$dataSubject->name_subject}} / {{$dataSubject->classs->name_class }}</option>
                                @endforeach
                            </select>

                            @error('id_subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="id_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester <span class="text-danger">*</span></label>
                            <select
                                name="id_semester"
                                id="id_semester"
                                autocomplete="id_semester"
                                value="{{ old('id_semester') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_semester') is-invalid @enderror"
                                required
                            >
                                <option selected="" disabled="">Select Semester</option>
                                @foreach($userSemester as $dataSemester)
                                    <option value={{$dataSemester->id}}>{{$dataSemester->name_semester}} </option>
                                @endforeach
                            </select>

                            @error('id_semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Add Data" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach($userSchedule as $data)
        <!-- Main modal View -->
        <div id="{{route('view.schedule', $data->id_sch)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="py-6 px-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">View Schedule</h3>
                        <form class="space-y-6" method="POST" action="{{route('add.schedule')}}">
                            @csrf
                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{$data->academicYear->name_academic_year}}</div>
                            </div>

                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Day</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{$data->day == 1 ? 'Monday': '' }} {{$data->day == 2 ? 'Tuesday': '' }} {{$data->day == 3 ? 'Wednesday': '' }} {{$data->day == 4 ? 'Thursday': '' }} {{$data->day == 5 ? 'Friday': '' }}</div>
                            </div>

                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{$data->time_start}} - {{$data->time_off}} WIB</div>
                            </div>

                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{$data->subjects->name_subject}}</div>
                            </div>

                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class / Major</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }}) / {{$data->semesters->name_semester}}</div>
                            </div>

                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teacher</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{$data->subjects->teachers->name}}</div>
                            </div>

                            <input type="button" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Close" data-modal-toggle="{{route('view.schedule', $data->id_sch)}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal Update -->
        <div id="{{route('edit.schedule', $data->id_sch)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('edit.schedule', $data->id_sch)}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="py-6 px-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Schedule</h3>
                        <form class="space-y-6" method="POST" action="{{route('update.schedule')}}">
                            @csrf
                            <input type="hidden" name="id_sch" value="{{ $data->id_sch }}">
                            <div>
                                <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year <span class="text-danger">*</span></label>
                                <select
                                    name="id_academic_year"
                                    id="id_academic_year"
                                    autocomplete="id_academic_year"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                                    required
                                >
                                    @foreach($userAY as $dataAY)
                                        <option value={{$dataAY->id}} {{ $dataAY->id == $data->academicYear->id ? 'selected': ''}}>{{$dataAY->name_academic_year}}</option>
                                    @endforeach
                                </select>

                                @error('id_class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Day Class<span class="text-danger">*</span></label>
                                <select
                                    name="day"
                                    id="day"
                                    autocomplete="day"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                                    required
                                >
                                    <option value="1" {{old('day',$data->day)=="1"? 'selected':''}}>Monday</option>
                                    <option value="2" {{old('day',$data->day)=="2"? 'selected':''}}>Tuesday</option>
                                    <option value="3" {{old('day',$data->day)=="3"? 'selected':''}}>Wednesday</option>
                                    <option value="4" {{old('day',$data->day)=="4"? 'selected':''}}>Thursday</option>
                                    <option value="5" {{old('day',$data->day)=="5"? 'selected':''}}>Friday</option>

                                </select>

                                @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="time_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time Start Class<span class="text-danger">*</span></label>
                                <input
                                    type="time"
                                    name="time_start"
                                    id="time_start"
                                    autocomplete="time_start"
                                    value="{{$data->time_start}}"
                                    pattern="[0-9]{2}:[0-9]{2}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('time_start') is-invalid @enderror"
                                    required
                                >

                                @error('time_start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="time_off" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time End Class<span class="text-danger">*</span></label>
                                <input
                                    type="time"
                                    name="time_off"
                                    id="time_off"
                                    autocomplete="time_off"
                                    value="{{$data->time_off}}"
                                    pattern="[0-9]{2}:[0-9]{2}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('time_off') is-invalid @enderror"
                                    required
                                >

                                @error('time_off')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="id_subject" class="id_subject block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject <span class="text-danger">*</span></label>
                                <select
                                    name="id_subject"
                                    id="id_subject"
                                    autocomplete="id_subject"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                                    required
                                >
                                    @foreach($userSubject as $dataSubject)
                                        <option value={{$dataSubject->id_sub}} {{ $dataSubject->id_sub == $data->subjects->id ? 'selected': ''}}>{{$dataSubject->name_subject}} / {{$dataSubject->classs->name_class }}</option>
                                    @endforeach
                                </select>

                                @error('id_subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <label for="id_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester <span class="text-danger">*</span></label>
                                <select
                                    name="id_semester"
                                    id="id_semester"
                                    autocomplete="id_semester"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_semester') is-invalid @enderror"
                                    required
                                >
                                    @foreach($userSemester as $dataSemester)
                                        <option value={{$dataSemester->id}} {{ $dataSemester->id == $data->semesters->id ? 'selected': ''}}>{{$dataSemester->name_semester}} </option>
                                    @endforeach
                                </select>

                                @error('id_semester')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Edit Data" >
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this schedule?</h3>
                        <a  href="{{ route('delete.schedule', $data->id_sch) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Yes, I'm sure
                        </a>
                        <button data-modal-toggle="popup-modal-{{route('model.delete.schedule', $data->id_sch)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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




