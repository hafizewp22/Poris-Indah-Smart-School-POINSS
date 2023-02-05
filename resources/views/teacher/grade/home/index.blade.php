<ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
    <div class="flex flex-wrap place-items-center ">
        <button  class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2" type="button" data-modal-toggle="add-modal">Add Data</button>
    </div>

    <div class="space-y-4 text-gray-500 dark:text-gray-400 h-[20rem] overflow-y-scroll scrollbar">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-[#464867] dark:bg-[#464867]">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        No
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subject
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Class
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Min Score
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Semester / Academic Year
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @forelse($userSubjectUpdate as $data)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$no++}}
                        </th>
                        <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                            {{$data->name_subject}}
                        </th>
                        <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                            {{$data->classs->name_class}}
                        </th>
                        <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                            {{$data->min_score}}
                        </th>
                        <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                            {{$data->name_semester}} ({{$data->name_academic_year}})
                        </th>
                        <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                            <button class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button" data-modal-toggle="{{route('edit.teacher.grade', $data->id_grade)}}">Edit</button>
                            @if($data->done == 0)
                                <a href="{{route('add.view.grade', $data->id_grade)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button">Add Grade</a>
                            @else
                                <a href="{{route('edit.view.grade', $data->id_grade)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button">Edit Grade</a>
                            @endif
                        </th>
                    </tr>

                    <!-- Main modal Update Class-->
                    <div id="{{route('edit.teacher.grade', $data->id_grade)}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{route('edit.teacher.grade', $data->id_grade)}}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="py-6 px-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Data</h3>
                                    <form class="space-y-6" method="POST" action="{{route('update.grade')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_grade" value="{{ $data->id_grade }}">
                                        <div>
                                            <label for="id_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject / Class</label>
                                            <div
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_subject') is-invalid @enderror"
                                            >
                                                {{$data->name_subject}} ({{$data->classs->name_class}})
                                            </div>
                                        </div>
                                        <div>
                                            <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year<span class="text-danger">*</span></label>
                                            <select
                                                id="id_academic_year"
                                                name="id_academic_year"
                                                required
                                                autocomplete="id_academic_year"
                                                value="{{ old('id_academic_year') }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                                            >
                                                @foreach($userAcademyYear as $dataAcademyYear )
                                                    <option value={{$dataAcademyYear->id}} {{ $dataAcademyYear->id == $data->id_academic_year ? 'selected': ''}}>{{$dataAcademyYear->name_academic_year}}</option>
                                                @endforeach
                                            </select>

                                            @error('id_academic_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="id_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester<span class="text-danger">*</span></label>
                                            <select
                                                id="id_semester"
                                                name="id_semester"
                                                required
                                                autocomplete="id_semester"
                                                value="{{ old('id_semester') }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_semester') is-invalid @enderror"
                                            >
                                                @foreach($userSemester as $dataSemester )
                                                    <option value={{$dataSemester->id}} {{ $dataSemester->id == $data->id_semester ? 'selected': ''}}>{{$dataSemester->name_semester}}</option>
                                                @endforeach
                                            </select>

                                            @error('id_semester')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="min_score" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Min Score (KKM) <span class="text-danger">*</span></label>
                                            <input
                                                type="number"
                                                min="50"
                                                max="100"
                                                name="min_score"
                                                id="min_score"
                                                autocomplete="min_score"
                                                value="{{$data->min_score}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('min_score') is-invalid @enderror"
                                                required
                                                placeholder="Assignment Title"
                                            >

                                            @error('min_score')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Done" >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr colspan = "6" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            No Data
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</ul>

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
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Data</h3>
                <form class="space-y-6" method="POST" action="{{route('add.grade')}}" enctype="multipart/form-data">
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
                        <label for="id_academic_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Academic Year<span class="text-danger">*</span></label>
                        <select
                            id="id_academic_year"
                            name="id_academic_year"
                            required
                            autocomplete="id_academic_year"
                            value="{{ old('id_academic_year') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_academic_year') is-invalid @enderror"
                        >
                            <option selected="" disabled="">Select Academic Year</option>
                            @foreach($userAcademyYear as $dataAcademyYear )
                                <option value={{$dataAcademyYear->id}}>{{$dataAcademyYear->name_academic_year}}</option>
                            @endforeach
                        </select>

                        @error('id_academic_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="id_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semester<span class="text-danger">*</span></label>
                        <select
                            id="id_semester"
                            name="id_semester"
                            required
                            autocomplete="id_semester"
                            value="{{ old('id_semester') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('id_semester') is-invalid @enderror"
                        >
                            <option selected="" disabled="">Select Semester</option>
                            @foreach($userSemester as $dataSemester )
                                <option value={{$dataSemester->id}}>{{$dataSemester->name_semester}}</option>
                            @endforeach
                        </select>

                        @error('id_semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="min_score" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Min Score (KKM) <span class="text-danger">*</span></label>
                        <input
                            type="number"
                            min="50"
                            max="100"
                            name="min_score"
                            id="min_score"
                            autocomplete="min_score"
                            value="{{ old('min_score') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('min_score') is-invalid @enderror"
                            required
                            placeholder="Assignment Title"
                        >

                        @error('min_score')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <input type="submit" class="w-full text-white bg-[#464867] hover:bg-[#464867] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Done" >
                </form>
            </div>
        </div>
    </div>
</div>
