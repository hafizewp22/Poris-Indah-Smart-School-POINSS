@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="flex">
        <div class=" h-12 w-2 bg-[#FF1ACD]"></div>
        <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Quiz</h3>
    </div>

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
                                Due Date
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
                        @php $no = 0 @endphp
                        @php $mytime = Carbon\Carbon::now(); @endphp

                        @forelse($userQuiz as $data)
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
                                    {{ date('d M Y - H:m', strtotime($data->due_date)) }} WIB
                                </td>
                                <th scope="row" class="py-4 px-6 text-gray-900 dark:text-white">
                                    @if(!$data->nulls())
                                        {{ (!empty($data->quizs[$no]->score)) ? ($data->quizs[$no]->score):'0' }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="py-4 px-6 flex text-gray-900 dark:text-white">
                                    @if(!empty( $data->nulls()))
                                        @if($data->due_date > $mytime)
                                            <a href="{{ (!empty($data->link))? url(route('view.start.quiz', $data->id_id)):''}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    @else
                                        -
                                    @endif

                                </td>
                            </tr>
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
