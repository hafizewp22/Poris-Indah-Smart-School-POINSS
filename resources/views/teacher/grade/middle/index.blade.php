<ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
    <div class="space-y-4 text-gray-500 dark:text-gray-400 h-[22rem] overflow-y-scroll scrollbar">
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
                            <a href="{{route('middle.view.teacher.grade', $data->id_grade)}}" class="focus:outline-none text-white bg-[#464867] hover:bg-[#464867] font-medium rounded-lg text-sm px-5 py-2.5 mb-2 " type="button">View Score Mid Exam</a>
                        </th>
                    </tr>
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

