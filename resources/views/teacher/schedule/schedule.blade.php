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
        <form class="flex" method="GET" action={{route('search.teacher.schedule')}}>
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
                                                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="{{route('add.cancelation', $data->id_sch)}}">Cancel</button>
                                                <a href="{{route('view.teacher.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2">View</a>
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
                                                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="{{route('add.cancelation', $data->id_sch)}}">Cancel</button>
                                                <a href="{{route('view.teacher.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2">View</a>
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
                                                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="{{route('add.cancelation', $data->id_sch)}}">Cancel</button>
                                                <a href="{{route('view.teacher.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2">View</a>
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
                                                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="{{route('add.cancelation', $data->id_sch)}}">Cancel</button>
                                                <a href="{{route('view.teacher.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2">View</a>
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
                                                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="{{route('add.cancelation', $data->id_sch)}}">Cancel</button>
                                                <a href="{{route('view.teacher.cancelation', $data->id_sch)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2">View</a>
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

    @foreach($userScheduleTec as $data)
        <!-- Main modal Update -->
        <div id="{{route('add.cancelation', $data->id_sch)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('add.cancelation', $data->id_sch)}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="py-6 px-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Cancel Schedule</h3>
                        <form class="space-y-6" method="POST" action="{{route('add.cancelation.infor')}}">
                            @csrf
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                                <div>{{$data->name_subject}}</div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class</label>
                                <div>{{$data->subjects->classs->name_class}} ({{$data->subjects->classs->major == 1 ? 'Science': 'Social' }})</div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester</label>
                                <div>{{$data->semesters->name_semester}}</div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time</label>
                                <div>{{$data->time_start}} - {{$data->time_off}} WIB</div>
                            </div>

                            <div>
                                <input
                                    type="hidden"
                                    name="id_schedule"
                                    id="id_schedule"
                                    autocomplete="id_schedule"
                                    value="{{$data->id_sch}}"
                                >
                            </div>
                            <div>
                                <label for="reason_cancelation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Reason of Cancelling<span class="text-danger">*</span></label>
                                <div class="controls">
                                <textarea
                                    name="reason_cancelation"
                                    id="reason_cancelation"
                                    autocomplete="reason_cancelation"
                                    required
                                    data-input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('reason_cancelation') is-invalid @enderror"
                                >{{ old('reason_cancelation') }}</textarea>
                                </div>

                                @error('reason_cancelation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Submit" >
                        </form>
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




