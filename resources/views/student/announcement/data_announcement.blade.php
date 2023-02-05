@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Announcement’s Data</h3>
    </div>

    @php $mytime = Carbon\Carbon::now(); @endphp

    <div>
        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">
            @foreach($dataAnnouncement as $data)
                @if($data->valid_date > $mytime)
                    <div class="pb-6" type="button" data-modal-toggle="{{ route('view.announcement.teacher', $data->id) }}">
                        <div class="box-border h-25 pt-6 rounded-lg pt-2 pb-2  p-4 bg-[#464867]">
                            <div class="flex justify-between">
                                <div>
                                    <div class="break-all space-y-2 pl-5">
                                        <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold ">{{ $data->title }}</h1>
                                        <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Input: {{ $data->created_at->format('d M Y - H:m') }}  WIB</h1>
                                        <h1 class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-white font-bold">Information for {{ $data->id_user == 0 ? 'Student': 'Teacher' }} </h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @else

                @endif

                <!-- Main modal View Class-->
                <div id="{{ route('view.announcement.teacher', $data->id) }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{ route('view.announcement.teacher', $data->id) }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="py-6 px-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">View Announcement</h3>
                                <div>
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $data->title}}</div>
                                </div>

                                <div>
                                    <label for="id_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Information For</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $data->id_user == 0 ? 'Student': 'Teacher'}}</div>
                                </div>

                                <div>
                                    <label for="valid_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Valid Date</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ date('d M Y - H:m', strtotime($data->valid_date)) }} WIB</div>

                                </div>

                                <div>
                                    <label for="detail_information" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Detail Information</label>
                                    <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-32 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white overflow-y-scroll scrollbar text-justify whitespace-pre-wrap">{{ $data->detail_information}}</div>
                                </div>

                                <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Close" data-modal-toggle="{{ route('view.announcement.teacher', $data->id) }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{$dataAnnouncement->links()}}

@endsection




