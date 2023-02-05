@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <a href="{{url('teacher/data-quiz')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Quiz History</h3>
    </div>

    <div class="flex ml-14">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{$userQuiz->subjects->teachers->name}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{$userQuiz->title}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{$userQuiz->subjects->name_subject}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ date('d M Y', strtotime($userQuiz->assign_date)) }} - {{ date('d M Y', strtotime($userQuiz->due_date)) }}</h1>
        </div>
    </div>

    <form>
        <div class="mt-4 flex justify-between">
            <div></div>
            <div>
                <a href="{{$userQuiz->link}}" target="_blank" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button">View Link</a>
                <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button" data-modal-toggle="add-modal">Add Data Score</button>
            </div>
            </div>
    </form>


    <div class="pt-6 pb-6 lg:h-96 xl:h-[31rem] overflow-y-scroll scrollbar">
        <div>
            <section>
                <div class="container mx-auto">
                    <div class="flex flex-wrap">
                        <div class="w-full px-4">
                            <!--Card-->
                            <div class="p-8 rounded shadow bg-white">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-[#464867] text-center">
                                        <th class="w-1/3 min-w-[160px] py-2 px-4 text-lg font-semibold text-white">
                                            Name Student
                                        </th>
                                        <th class="w-2/5 min-w-[160px] text-lg font-semibold text-white"
                                        >
                                            Score
                                        </th>
                                        <th class="w-24 min-w-[160px] text-lg font-semibold text-white ">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($quizs as $data)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                            <td class="py-4 px-6 text-gray-900 dark:text-white">
                                                {{$data->username}} - {{$data->name}}
                                            </th>
                                            <td class="py-4 px-6 text-gray-900 dark:text-white">
                                                {{$data->score }}
                                            </td>
                                            <td class="py-4 px-6 flex text-gray-900 dark:text-white">
                                                <a type="button" data-modal-toggle="{{route('view.score.quiz', $data->id_id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                    </svg>
                                                </a>

                                                <a data-modal-toggle="popup-modal-{{route('model.delete.score.quiz', $data->id_id)}}" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>

                                        <div id="{{route('view.score.quiz', $data->id_id)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('view.score.quiz', $data->id_id)}}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="py-6 px-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Score</h3>
                                                        <form class="space-y-6" method="POST" action="{{route('update.score.class')}}">
                                                            @csrf
                                                            <input type="hidden" name="id_id" value="{{ $data->id_id }}">
                                                            <div>
                                                                <label for="id_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student<span class="text-danger">*</span></label>
                                                                <select
                                                                    id="id_student"
                                                                    name="id_student"
                                                                    required
                                                                    autocomplete="id_student"
                                                                    value="{{ old('id_student') }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_student') is-invalid @enderror"
                                                                >
                                                                    @foreach($userStudent as $dataStudent)
                                                                        <option value={{$dataStudent->id_user}} {{ $dataStudent->id_user == $data->id_student ? 'selected': ''}}>{{$dataStudent->name}} ({{$dataStudent->name }})</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('id_subject')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div>
                                                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Assignment Title <span class="text-danger">*</span></label>
                                                                <input
                                                                    type="number"
                                                                    name="score"
                                                                    id="score"
                                                                    autocomplete="score"
                                                                    value="{{ $data->score }}"
                                                                    min="0"
                                                                    max="100"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('score') is-invalid @enderror"
                                                                    required
                                                                    placeholder="0 - 100"
                                                                >

                                                                @error('score')
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

                                        <div id="popup-modal-{{route('model.delete.score.quiz', $data->id_id)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this student?</h3>
                                                        <a  href="{{ route('delete.score.quiz', $data->id_id) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            Yes, I'm sure
                                                        </a>
                                                        <button data-modal-toggle="popup-modal-{{route('model.delete.score.quiz', $data->id_id)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr colspan = "3" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                No Data
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!--/Card-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Score</h3>
                    <form class="space-y-6" method="POST" action="{{route('add.score.quiz')}}">
                        @csrf
                        <input
                            type="hidden"
                            name="id_quiz"
                            id="id_quiz"
                            autocomplete="id_quiz"
                            value="{{$userQuiz->id_id}}"
                        >

                        <div>
                            <label for="id_student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student<span class="text-danger">*</span></label>
                            <select
                                id="id_student"
                                name="id_student"
                                required
                                autocomplete="id_student"
                                value="{{ old('id_student') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_student') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Student</option>
                                @foreach($userStudent as $dataStudent)
                                    <option value={{$dataStudent->id_user}}>{{$dataStudent->username}} - {{$dataStudent->name}}</option>
                                @endforeach
                            </select>

                            @error('id_subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Assignment Title <span class="text-danger">*</span></label>
                            <input
                                type="number"
                                name="score"
                                id="score"
                                autocomplete="score"
                                value="{{ old('score') }}"
                                min="0"
                                max="100"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('score') is-invalid @enderror"
                                required
                                placeholder="0 - 100"
                            >

                            @error('score')
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

@endsection




