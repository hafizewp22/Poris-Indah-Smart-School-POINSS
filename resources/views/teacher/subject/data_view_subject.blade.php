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
        <a href="{{url('teacher/data-subject')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">View Subject : {{ $dataSubject->name_subject}} / {{$dataSubject->classs->name_class}}</h3>
    </div>

    <div class="flex justify-between">
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

        <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal">Add Material</button>
    </div>

    <div class=" pb-6 lg:h-96">
        <div class="px-5 py-2.5 mb-2 mt-6 text-xl text-justify">
            {{ $dataSubject->detail_material }}
        </div>

        <div class="grid grid-cols-1 divide-y">
            <div class="mt-2 focus:outline-none text-black bg-[#EDEDED] hover:bg-[#EDEDED] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">
                <h1 class="text-xl font-bold">Textbook:</h1>
                <h1 class=" text-lg ">{{$dataSubject->text_book}}</h1>
            </div>
        </div>

        <div class="xl:h-[19rem] overflow-y-scroll scrollbar">

            @php $no = 1; @endphp

            @foreach($userSubjectsDetail as $data)
                <div class="tab mt-3 w-full rounded-lg overflow-hidden border-t bg-[#464867] hover:bg-[#464867] text-white">
                    <input class="absolute opacity-0" id="tab-single-{{$data->id_sub_detail}}" type="radio" name="tabs2">
                    <label class="block p-4 leading-normal cursor-pointer font-bold" for="tab-single-{{$data->id_sub_detail}}">Week {{$no++}} : {{$data->title}}</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal text-black">
                        <div class="p-2 mb-3 mt-3">
                            <div class="overflow-x-auto relative">
                                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <tbody class="text-xs text-gray-700 uppercase bg-[#BEBEBE] dark:bg-[#BEBEBE] dark:text-[#BEBEBE]">
                                    <div class="flex justify-between">
                                        <div class="flex ml-5 mr-5">
                                            <div>
                                                <h1 class="text-lg font-bold">Start Date:</h1>
                                                <div>{{ date('d M Y', strtotime($data->start_date)) }}</div>
                                            </div>

                                            <div class="ml-20">
                                                <h1 class="text-lg font-bold">Time:</h1>
                                                <div>{{$data->schedules->time_start}} - {{$data->schedules->time_off}} WIB</div>
                                            </div>

                                            <div class="ml-20">
                                                <h1 class="text-lg font-bold">Room:</h1>
                                                <div>{{$data->room}}</div>
                                            </div>
                                        </div>

                                        <button data-modal-toggle="{{route('edit.teacher.subject.detail', $data->id_sub_detail)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" >Edit</button>
                                    </div>

                                    <div class="mt-3 ml-5 mr-5">
                                        <h1 class="text-lg font-bold">Sub Topics:</h1>
                                        <div>{{$data->sub_topics}}</div>
                                    </div>

                                    <div class="mt-3 ml-5 box-border h-25 w-64 p-2 rounded-lg bg-[#FFAA06]">
                                        <a class="flex" href="{{route('view.teacher.subject', $data->id_sub_detail)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <h1 class="ml-2 text-xl text-white font-bold">Book Material</h1>
                                        </a>
                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main modal Update Class-->
                <div id="{{route('edit.teacher.subject.detail', $data->id_sub_detail)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-7xl h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('edit.teacher.subject.detail', $data->id_sub_detail)}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Material</h3>
                                <form class="space-y-6" method="POST" action="{{route('update.teacher.subject.detail')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_sub_detail" value="{{ $data->id_sub_detail }}">
                                    <div>
                                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date <span class="text-danger">*</span></label>
                                        <input
                                            type="date"
                                            name="start_date"
                                            id="start_date"
                                            autocomplete="start_date"
                                            value="{{$data->start_date}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('start_date') is-invalid @enderror"
                                            required
                                        >

                                        @error('start_date')
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
                                            @foreach($userSchedule as $dataSchedule)
                                                <option value="{{$dataSchedule->id_sch}}" {{ $dataSchedule->id_sch == $data->time ? 'selected': ''}}>{{$dataSchedule->time_start}} - {{$dataSchedule->time_off}} WIB</option>
                                            @endforeach
                                        </select>

                                        @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title<span class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            autocomplete="title"
                                            value="{{$data->title}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('title') is-invalid @enderror"
                                            required
                                        >

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="sub_topics" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sub Topics<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <textarea
                                                name="sub_topics"
                                                autocomplete="sub_topics"
                                                required
                                                data-input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('sub_topics') is-invalid @enderror"
                                            >{{$data->sub_topics}}</textarea>
                                        </div>

                                        @error('sub_topics')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="file_material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">File (PDF)<span class="text-danger">*</span></label>
                                        <input
                                            type="file"
                                            name="file_material"
                                            id="file_material"
                                            autocomplete="file_material"
                                            value="{{ old('file_material') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('file_material') is-invalid @enderror"
                                        >

                                        @error('file_material')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Save Data" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Material</h3>
                    <form class="space-y-6" method="POST" action="{{route('upload.teacher.subject.detail')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input
                                type="hidden"
                                name="id_subject"
                                id="id_subject"
                                autocomplete="id_subject"
                                value="{{ $dataSubject->id_sub }}"
                                required
                            >
                        </div>

                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date <span class="text-danger">*</span></label>
                            <input
                                type="date"
                                name="start_date"
                                id="start_date"
                                autocomplete="start_date"
                                value="{{ old('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('start_date') is-invalid @enderror"
                                required
                            >

                            @error('start_date')
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

                        <div>
                            <input
                                type="hidden"
                                name="room"
                                id="room"
                                autocomplete="room"
                                value="{{ $dataSubject->classs->name_class }}"
                            >
                        </div>

                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title<span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                autocomplete="title"
                                value="{{ old('title') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('title') is-invalid @enderror"
                                required
                            >

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="sub_topics" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sub Topics<span class="text-danger">*</span></label>
                            <div class="controls">
                                <textarea
                                    name="sub_topics"
                                    {{--                                    id="dexis"--}}
                                    autocomplete="sub_topics"
                                    required
                                    data-input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('sub_topics') is-invalid @enderror"
                                >{{ old('sub_topics') }}</textarea>
                            </div>

                            @error('sub_topics')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="file_material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">File (PDF)<span class="text-danger">*</span></label>
                            <input
                                type="file"
                                name="file_material"
                                id="file_material"
                                autocomplete="file_material"
                                value="{{ old('file_material') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('file_material') is-invalid @enderror"
                                required
                            >

                            @error('file_material')
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
