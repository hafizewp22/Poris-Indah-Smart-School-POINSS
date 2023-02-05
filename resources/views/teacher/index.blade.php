@extends('layouts.app')

@section('content')

    @php $mytime = Carbon\Carbon::now(); @endphp

   <div class="flex">
       <img class="h-12 w-12" src="{{asset('images/hello.png')}}" >
       <h3 class="p-2 mb-2 text-2xl font-bold text-gray-900 dark:text-white">Hello, Mr/Mrs {{ Auth::user()->name }}!</h3>
   </div>

   <div class="lg:h-[37rem] xl:h-[37rem] mt-6 pb-10 overflow-y-scroll scrollbar">
       <div role="status" class="space-y-8 md:space-y-0 md:space-x-8 md:flex md:items-stretch">
           <div class="w-full">

               <h3 class=" text-2xl font-bold text-gray-900 dark:text-white mt-6">Assignment / Quiz</h3>
               <hr class=" h-px bg-black border-0 dark:bg-black">

               <div class="w-full  border shadow-md  ">
                   <div class="sm:hidden">
                       <label for="tabs" class="sr-only">Select tab</label>
                       <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 sm:text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           <option>Statistics</option>
                           <option>Quiz</option>
                       </select>
                   </div>
                   <ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg divide-x divide-gray-200 sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                       <li class="w-full">
                           <button id="assignment-tab" data-tabs-target="#assignment" type="button" role="tab" aria-controls="assignment" aria-selected="true" class="inline-block p-4 w-full bg-gray-50 rounded-tl-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Assignment</button>
                       </li>
                       <li class="w-full">
                           <button id="quiz-tab" data-tabs-target="#quiz" type="button" role="tab" aria-controls="quiz" aria-selected="false" class="inline-block p-4 w-full bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Quiz</button>
                       </li>
                   </ul>

                   <div id="defaultTabContent" class="">
                       <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-64"  id="assignment" role="tabpanel" aria-labelledby="quiz-tab">
                           <!-- List -->
                           <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-56 overflow-y-scroll scrollbar">
                               @forelse($userAssignments as $data)
                                   @if($data->due_date > $mytime)
                                       <a href="{{route('data.assignment.teacher')}}" class="flex space-x-2">
                                           <!-- Icon -->
                                           <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                           <span class="font-light leading-tight">{{$data->name_subject}} - {{$data->title}}, {{ date('d M Y - H:m', strtotime($data->due_date)) }} WIB</span>
                                       </a>
                                   @endif
                               @empty
                                   <li class="flex space-x-2">
                                       <!-- Icon -->
                                       No Data
                                   </li>
                               @endforelse
                           </ul>
                       </div>

                       <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800 h-64" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                           <!-- List -->
                           <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400 h-56 overflow-y-scroll scrollbar">
                               @forelse($userQuiz as $data)
                                   @if($data->due_date > $mytime)
                                       <a href="{{route('data.quiz')}}" class="flex space-x-2">
                                           <!-- Icon -->
                                           <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                           <span class="font-light leading-tight">{{$data->name_subject}} - {{$data->title}}, {{ date('d M Y - H:m', strtotime($data->due_date)) }} WIB</span>
                                       </a>
                                   @endif
                               @empty
                                   <li class="flex space-x-2">
                                       <!-- Icon -->
                                       No Data
                                   </li>
                               @endforelse
                           </ul>
                       </div>
                   </div>
               </div>
           </div>

           <div class="shadow-md rounded sm:w-1/2 ">
               <div class="pt-2 pr-4 pl-4 pb-2 w-full">
                   <h3 class=" text-2xl font-bold text-gray-900 dark:text-white mt-6">Today Courses</h3>
                   <hr class=" h-px bg-black border-0 dark:bg-black">
               </div>

               <div class="pr-4 pb-4 pl-4 h-[36rem] sm:h-[36rem] overflow-y-scroll scrollbar">
                   <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white mt-10">Monday</h5>
                   @forelse($scheduleMonday as $data)
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$data->subjects->name_subject}} / {{$data->time_start}} - {{$data->time_off}} WIB</p>
                   @empty
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">No Class Schedule Yet.</p>
                   @endforelse
                   <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white mt-10">Tuesday</h5>
                   @forelse($scheduleTuesday as $data)
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$data->subjects->name_subject}} / {{$data->time_start}} - {{$data->time_off}} WIB</p>
                   @empty
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">No Class Schedule Yet.</p>
                   @endforelse
                   <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white mt-10">Wednesday</h5>
                   @forelse($scheduleWednesday as $data)
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$data->subjects->name_subject}} / {{$data->time_start}} - {{$data->time_off}} WIB</p>
                   @empty
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">No Class Schedule Yet.</p>
                   @endforelse
                   <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white mt-10">Thursday</h5>
                   @forelse($scheduleThursday as $data)
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$data->subjects->name_subject}} / {{$data->time_start}} - {{$data->time_off}} WIB</p>
                   @empty
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">No Class Schedule Yet.</p>
                   @endforelse
                   <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white mt-10">Friday</h5>
                   @forelse($scheduleFriday as $data)
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">{{$data->subjects->name_subject}} / {{$data->time_start}} - {{$data->time_off}} WIB</p>
                   @empty
                       <p class="text-base text-gray-500 sm:text-lg dark:text-gray-400">No Class Schedule Yet.</p>
                   @endforelse
               </div>

           </div>
       </div>
   </div>

@endsection
