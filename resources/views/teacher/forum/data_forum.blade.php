@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Forum</h3>
    </div>

    <form class="flex justify-between" method="GET" action="{{route('search.teacher.forum')}}">
        <div class="flex">
            <div class="flex flex-wrap place-items-center ">
                <div class="md:w-40 px-3" >
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-last-name">
                        Subject / Class
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
        <div class="md:w-64 px-3">
            <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none" type="button" data-modal-toggle="add-modal">Add Forum</button>
        </div>
    </form>


    <div>
        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">

            @foreach($userForum as $data)
                <div class="pb-6">
                    <div class="box-border h-25 pt-6 rounded-lg pt-2 pb-2  p-4 bg-[#464867]">
                        <div class="flex justify-between">
                            <div>
                                <div class="break-all space-y-2 pl-5">
                                    <h1 class="ml-2 text-xl font-bold text-gray-900 dark:text-gray-300 text-white font-bold ">{{$data->title_forum}}</h1>
                                    <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Subject: {{$data->name_subject}} ({{$data->name_class}})</h1>
                                    <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Date @if($data->done == '1') Update @else Upload @endif: {{ date('d M Y - H:m', strtotime($data->date_forum)) }} WIB</h1>
                                    <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Name Upload: {{$data->userforums->username}} - {{$data->userforums->name}}</h1>
                                </div>

                            </div>

                            <div class="pr-4 flex flex-wrap -mx-3 place-items-center space-x-4 ">
                                <a href="{{route('view.teacher.forum', $data->id_forum)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                                <a data-modal-toggle="popup-modal-{{route('model.delete.teacher.forum', $data->id_forum)}}" type="button" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-white" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                                @if($data->id_user_full == Auth::user()->id)
                                    <a type="button" data-modal-toggle="edit-{{route('edit.teacher.forum', $data->id_forum)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popup-modal-{{route('model.delete.teacher.forum', $data->id_forum)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this forum?</h3>
                                <a  href="{{ route('delete.teacher.forum', $data->id_forum) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Yes, I'm sure
                                </a>
                                <button data-modal-toggle="popup-modal-{{route('model.delete.teacher.forum', $data->id_forum)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main modal Edit Class-->
                <div id="edit-{{route('edit.teacher.forum', $data->id_forum)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edit-{{route('edit.teacher.forum', $data->id_forum)}}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Forum</h3>
                                <form class="space-y-6" method="POST" action="{{route('update.teacher.forum')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_forum" value="{{ $data->id_forum }}">
                                    <div>
                                        <label for="id_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject / Class</label>
                                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                                        >
                                            {{$data->name_subject}} ({{$data->subjectforums->classs->name_class}})
                                        </div>
                                    </div>

                                    <div>
                                        <label for="title_forum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Forum Title <span class="text-danger">*</span></label>
                                        <input
                                            type="title_forum"
                                            name="title_forum"
                                            id="title_forum"
                                            autocomplete="title_forum"
                                            value="{{$data->title_forum}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('title_forum') is-invalid @enderror"
                                            required
                                            placeholder="Forum Title"
                                        >

                                        @error('title_forum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description <span class="text-danger">*</span></label>
                                        <textarea
                                            type="description"
                                            name="description"
                                            id="description"
                                            autocomplete="description"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('description') is-invalid @enderror"
                                            required
                                            placeholder="Forum Description"
                                        >{{$data->description}}</textarea>

                                        @error('description')
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
    </div>

    <!-- Main modal Add Class-->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Forum</h3>
                    <form class="space-y-6" method="POST" action="{{route('add.teacher.forum')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="id_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject / Class<span class="text-danger">*</span></label>
                            <select
                                id="id_subject"
                                name="id_subject"
                                required
                                autocomplete="id_subject"
                                value="{{ old('id_subject') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Subject / Class</option>
                                @foreach($userSubject as $dataSubject)
                                    <option value={{$dataSubject->id_sub}}>{{$dataSubject->name_subject}} ({{$dataSubject->classs->name_class}})</option>
                                @endforeach
                            </select>

                            @error('id_subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="title_forum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Forum Title <span class="text-danger">*</span></label>
                            <input
                                type="title_forum"
                                name="title_forum"
                                id="title_forum"
                                autocomplete="title_forum"
                                value="{{ old('title_forum') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('title_forum') is-invalid @enderror"
                                required
                                placeholder="Forum Title"
                            >

                            @error('title_forum')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description <span class="text-danger">*</span></label>
                            <textarea
                                type="description"
                                name="description"
                                id="description"
                                autocomplete="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('description') is-invalid @enderror"
                                required
                                placeholder="Forum Description"
                            >{{ old('description') }}</textarea>

                            @error('description')
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




