@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Assignment</h3>
    </div>

    @php $no = 0 @endphp
    @php $mytime = Carbon\Carbon::now(); @endphp

    <div>
        <div class="pt-6 pb-6 lg:h-96 xl:h-[29rem] overflow-y-scroll scrollbar">
            <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-96 overflow-y-scroll scrollbar">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Subject
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Title
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Due Date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Submission Date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Score
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($userAssignments as $data)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->subjects->name_subject}}
                                </th>

                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{$data->title}}
                                </td>
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ date('d M Y - H:m', strtotime($data->due_date)) }} WIB
                                </td>
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    @if(!$data->nulls())
                                        {{date('d M Y - H:m' ,strtotime($data->assignments[$no]->updated_at))}}
                                    @else
                                        Not uploaded yet
                                    @endif
                                </td>
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    @if(!$data->nulls())
                                        Submitted
                                    @else
                                        Waiting
                                    @endif
                                </td>
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    @if(!$data->nulls())
                                        {{ (!empty($data->assignments[$no]->score)) ? ($data->assignments[$no]->score):'0' }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="py-4 px-6 flex text-gray-900 dark:text-white">
                                    @if(!$data->nulls())
                                        <a href="{{ (!empty($data->assignments[$no]->file_assignment))? url('upload/assignment/students/'.$data->assignments[$no]->file_assignment):''}}" download>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @endif

                                    <div>
                                        @if($data->due_date > $mytime)
                                            @if(!$data->nulls())
                                                <a type="button" data-modal-toggle="{{route('edit.assignment', $data->assignments[$no]->id_id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>

                                                <!-- Main modal Edit Assignment-->
                                                <div id="{{route('edit.assignment', $data->assignments[$no]->id_id)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('edit.assignment', $data->assignments[$no]->id_id)}}">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="py-6 px-6 lg:px-8">
                                                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><e>Edit</e> Assignment</h3>
                                                                <form class="space-y-6" method="POST" action="{{route('update.student.assignment')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id_id" value="{{ $data->assignments[$no]->id_id }}">

                                                                    <div>
                                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subjects</label>
                                                                        <div
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                        >
                                                                            {{$data->subjects->name_subject}}
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                                                        <div
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                        >
                                                                            {{$data->title}}
                                                                        </div>
                                                                    </div>

                                                                    <div>
                                                                        <label for="file_assignment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Add File <span class="text-danger">*</span></label>
                                                                        <input
                                                                            type="file"
                                                                            name="file_assignment"
                                                                            id="file_asg"
                                                                            autocomplete="file_assignment"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('file_assignment') is-invalid @enderror"
                                                                            required
                                                                        >

                                                                        @error('file_assignment')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>

                                                                    <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Edit" >
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <a type="button" data-modal-toggle="{{route('input.assignment', $data->id_id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                        @endif
                                    </div>

                                    <a href="{{ (!empty($data->file_asg))? url('upload/assignment/question/'.$data->file_asg):url('images/no_image.jpg') }}" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                            <!-- Main modal Upload Assignment-->
                            <div id="{{route('input.assignment', $data->id_id)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('input.assignment', $data->id_id)}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="py-6 px-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Upload Assignment</h3>
                                            <form class="space-y-6" method="POST" action="{{route('upload.student.assignment')}}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_id" value="{{ $data->id_id }}">
                                                <input
                                                    type="hidden"
                                                    name="id_assignment"
                                                    id="id_assignment"
                                                    autocomplete="id_assignment"
                                                    value="{{ $data->id_id }}"
                                                >

                                                <div>
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subjects</label>
                                                    <div
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    >
                                                        {{$data->subjects->name_subject}}
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                                    <div
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    >
                                                        {{$data->title}}
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="file_assignment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Add File <span class="text-danger">*</span></label>
                                                    <input
                                                        type="file"
                                                        name="file_assignment"
                                                        id="file_asg"
                                                        autocomplete="file_assignment"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('file_assignment') is-invalid @enderror"
                                                        required
                                                    >

                                                    @error('file_assignment')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Upload" >
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr colspan = "7" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No Data
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </ul>
        </div>
    </div>


@endsection
