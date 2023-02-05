@extends('layouts.app')

@section('content')

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <a href="{{url('admin/data-class')}}" class="text-2xl font-bold text-[#464867] dark:text-white hover:text-[#464867]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">View Class : {{ $data->name_class }} / {{ $data->major == 1 ? 'Science': 'Social' }} / {{$data->teachers->name }}</h3>
    </div>

    <div>
        <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="add-modal-student">Add Student</button>

        <div class="pt-6 pb-6 lg:h-96 xl:h-[31rem] overflow-y-scroll scrollbar">

            <section >
                <div class="container mx-auto">
                    <div class="-mx-4 flex flex-wrap">
                        <div class="w-full px-4">
                            <!--Card-->
                            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                                <table id="example1" class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-[#464867] text-center">
                                        <th class="w-24 min-w-[160px] py-2 px-4 text-lg font-semibold text-white"
                                        >
                                            No
                                        </th>
                                        <th class="w-2/5 min-w-[160px]  text-lg font-semibold text-white"
                                        >
                                            Name Student
                                        </th>
                                        <th class="w-1/3 min-w-[160px] text-lg font-semibold text-white "
                                        >
                                            NISN
                                        </th>
                                        <th class="w-1/6 min-w-[160px]  text-lg font-semibold text-white"
                                        >
                                            Action
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php $no = 1; @endphp

                                    @foreach($viewClassStudent as $data)
                                        <tr>
                                            <td class="text-dark border-b border-l border-[#E8E8E8]  py-2 px-4 text-center text-base font-medium"
                                            >
                                                {{ $no++ }}
                                            </td>
                                            <td class="text-dark border-b border-[#E8E8E8] bg-white text-center text-base font-medium"
                                            >
                                                {{ $data->students->name }}
                                            </td>
                                            <td class="text-dark border-b border-[#E8E8E8] text-center text-base font-medium"
                                            >
                                                {{ $data->students->username }}
                                            </td>
                                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-2 px-4 text-center text-base font-medium">
                                                <div class="pr-4 flex flex-wrap -mx-3 place-items-center space-x-4  text-center">
                                                    <a type="button" data-modal-toggle="popup-modal-{{route('model.delete.class.student', $data->id)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-[#464867]" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>

                                                    <a type="button" data-modal-toggle="{{ route('data.class.student.detail', $data->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-[#464867]" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Main modal Update Student-->
                                        <div id="{{ route('data.class.student.detail', $data->id) }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{ route('data.class.student.detail', $data->id) }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="py-6 px-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Student</h3>
                                                        <form class="space-y-6" method="POST" action="{{ route('update.class.student') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                            <div>
                                                                <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Student <span class="text-danger">*</span></label>
                                                                <select
                                                                    id="id_user"
                                                                    name="id_user"
                                                                    required
                                                                    autocomplete="id_user"
                                                                    value="{{ $data->id_user }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_user') is-invalid @enderror"
                                                                >
                                                                    @foreach($userStudent as $dataStudent)
                                                                        @if($dataStudent->user_type == '0')
                                                                            <option value="{{$dataStudent->id}}" {{ $dataStudent->id == $data->students->id ? 'selected': ''}}>{{$dataStudent->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>

                                                                @error('id_user')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div>
                                                                <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class <span class="text-danger">*</span></label>
                                                                <select
                                                                    id="id_class"
                                                                    name="id_class"
                                                                    required
                                                                    autocomplete="id_class"
                                                                    value="{{ $data->id_class }}"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_class') is-invalid @enderror"
                                                                >
                                                                    @foreach($userClassDe as $dataClass)
                                                                        <option value="{{$dataClass->id}}" {{ $dataClass->id == $data->classs->id ? 'selected': ''}}>{{$dataClass->name_class}} / {{$dataClass->major == 1 ? 'Science': 'Social'}}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('id_class')
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

                                        <div id="popup-modal-{{route('model.delete.class.student', $data->id)}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this student?</h3>
                                                        <a  href="{{ route('delete.class.student', $data->id) }}" type="button" class="text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            Yes, I'm sure
                                                        </a>
                                                        <button data-modal-toggle="popup-modal-{{route('model.delete.class.student', $data->id)}}" type="button" class="text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>
                            <!--/Card-->
                            <div class="max-w-full overflow-x-auto p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <!-- Main modal Add Student-->
    <div id="add-modal-student" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-modal-student">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Student</h3>
                    <form class="space-y-6" method="POST" action="{{ route('add.class.student') }}">
                        @csrf
                        <div>
                            <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name Student <span class="text-danger">*</span></label>
                            <select
                                id="id_user"
                                name="id_user"
                                required
                                autocomplete="id_user"
                                value="{{ old('id_user') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_user') is-invalid @enderror"
                            >
                                <option selected="" disabled="">Select Student</option>
                                @foreach($userStudent as $dataStudent)
                                    @if($dataStudent->user_type == '0')
                                        <option value={{$dataStudent->id}}>{{$dataStudent->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('id_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="major" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Class <span class="text-danger">*</span></label>
                            <select
                                id="id_class"
                                name="id_class"
                                required
                                autocomplete="id_class"
                                value="{{ old('id_class') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_class') is-invalid @enderror"
                            >
                                <option value="{{$userClass->id}}">{{$userClass->name_class}} / {{$userClass->major == 1 ? 'Science': 'Social'}}</option>
                            </select>

                            @error('id_class')
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




