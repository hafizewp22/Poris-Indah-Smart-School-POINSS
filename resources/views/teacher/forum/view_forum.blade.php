@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <a href="{{url('teacher/forum')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Forum - {{$forums->title_forum}}</h3>
    </div>

    <div class="flex ml-14">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
            <h1 class="ml-2 text-xl">Upload Name: {{ $forums->userforums->name}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $forums->subjectforums->subjectType->subject_type}}</h1>
        </div>

        <div class="flex ml-14">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="ml-2 text-xl">{{ $forums->subjectforums->name_subject}}</h1>
        </div>

    </div>

    <div class="pt-6 pb-6 lg:h-96 xl:h-[34rem] overflow-y-scroll scrollbar">
        <div class="pb-6">
            <div class="box-border h-25 pt-6 rounded-lg pt-2 pb-2  p-4 bg-slate-200">
                <div class="flex justify-between">
                    <div>
                        <div class="break-all space-y-2 pl-5">
                            <h1 class="ml-2 text-3xl font-bold text-black dark:text-black text-black	font-bold ">{{$forums->title_forum}}</h1>
                            <h1 class="ml-2 text-sm font-medium text-black dark:text-black text-black font-bold">{{$forums->description}}</h1>
                            <br />
                            <div>
                                <h1 class="ml-2 text-sm font-medium text-black dark:text-black text-black font-bold">{{$forums->userforums->name}} - {{ date('d M Y - H:m', strtotime($forums->date_forum)) }} WIB @if($forums->done == '1') (Update)  @endif</h1>
                            </div>
                            <div>
                                <button class="ml-2 focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal">Reply</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @foreach($forumDetails as $data)
            <div class="pb-6">
                <div class="box-border h-25 pt-6 rounded-lg pt-2 pb-2  p-4 bg-slate-200">
                    <div class="flex justify-between">
                        <div>
                            <div class="break-all space-y-2 pl-5">
                                <h1 class="ml-2 text-sm font-medium text-black dark:text-black text-black">{{$data->description_detail}}</h1>
                                <br />
                                <div>
                                    <h1 class="ml-2 text-sm font-medium text-black dark:text-black text-black font-bold">{{$data->userforums->name}} - {{ date('d M Y - H:m', strtotime($data->date_forum_detail)) }} WIB @if($data->done_detail == '1') (Update) @endif</h1>
                                </div>

                                <div class="ml-2 flex flex-wrap place-items-center space-x-4">
                                    @if($data->id_user_full1 == Auth::user()->id)
                                        <a type="button" data-modal-toggle="edit-{{route('edit.teacher.forum.detail', $data->id_forum_detail)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>
                                    @else

                                    @endif
                                    <a data-modal-toggle="popup-modal-{{route('model.delete.teacher.forum.detail', $data->id_forum_detail)}}" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-black" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="popup-modal-{{route('model.delete.teacher.forum.detail', $data->id_forum_detail)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this forum reply?</h3>
                            <a  href="{{ route('delete.teacher.forum.detail', $data->id_forum_detail) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Yes, I'm sure
                            </a>
                            <button data-modal-toggle="popup-modal-{{route('model.delete.teacher.forum.detail', $data->id_forum_detail)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main modal Edit Class-->
            <div id="edit-{{route('edit.teacher.forum.detail', $data->id_forum_detail)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edit-{{route('edit.teacher.forum.detail', $data->id_forum_detail)}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Forum</h3>
                            <form class="space-y-6" method="POST" action="{{route('update.teacher.forum.detail')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_forum_detail" value="{{ $data->id_forum_detail }}">

                                <div>
                                    <label for="description_detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description <span class="text-danger">*</span></label>
                                    <textarea
                                        type="description_detail"
                                        name="description_detail"
                                        id="description_detail"
                                        autocomplete="description_detail"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('description_detail') is-invalid @enderror"
                                        required
                                        placeholder="Forum Description"
                                    >{{$data->description_detail}}</textarea>

                                    @error('description_detail')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Update Data" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main modal Add Class-->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-7xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Reply Forum</h3>
                    <form class="space-y-6" method="POST" action="{{route('add.teacher.forum.detail')}}" enctype="multipart/form-data">
                        @csrf
                        <input
                            type="hidden"
                            name="id_forum"
                            id="id_forum"
                            value="{{$forums->id_forum}}"
                        >

                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description <span class="text-danger">*</span></label>
                            <textarea
                                type="description_detail"
                                name="description_detail"
                                id="description_detail"
                                autocomplete="description_detail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('description_detail') is-invalid @enderror"
                                required
                                placeholder="Forum Description"
                            >{{ old('description_detail') }}</textarea>

                            @error('description_detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Reply" >
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
