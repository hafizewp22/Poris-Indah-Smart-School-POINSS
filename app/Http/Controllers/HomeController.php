<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Quiz;
use App\Models\Schedule;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userStudent = User::where('user_type', '=', 0)->count();
        $userTeacher = User::where('user_type', '=', 2)->count();
        $users = User::count();

        if(Auth::id()){
            if(Auth::user()->user_type == '0'){
                $userAssignments = Assignment::join('subjects', 'assignments.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
                    ->where('class_details.id_user', '=', Auth::user()->id)
                    ->get();

                $userQuiz = Quiz::join('subjects', 'quizzes.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
                    ->where('class_details.id_user', '=', Auth::user()->id)
                    ->get();

                $scheduleMonday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
                    ->join('users', 'class_details.id_user', '=', 'users.id')
                    ->orWhere('users.id', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 1)
                    ->get();
                $scheduleTuesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
                    ->join('users', 'class_details.id_user', '=', 'users.id')
                    ->orWhere('users.id', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 2)
                    ->get();
                $scheduleWednesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
                    ->join('users', 'class_details.id_user', '=', 'users.id')
                    ->orWhere('users.id', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 3)
                    ->get();
                $scheduleThursday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
                    ->join('users', 'class_details.id_user', '=', 'users.id')
                    ->orWhere('users.id', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 4)
                    ->get();
                $scheduleFriday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
                    ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
                    ->join('users', 'class_details.id_user', '=', 'users.id')
                    ->orWhere('users.id', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 5)
                    ->get();

                return view('student.index', compact('userStudent', 'userTeacher', 'users', 'userAssignments', 'userQuiz', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday'));
            } elseif(Auth::user()->user_type == '1'){
                return view('admin.index', compact('userStudent', 'userTeacher', 'users'));
            } elseif(Auth::user()->user_type == '2') {
                $userAssignments = Subjects::join('assignments', 'assignments.id_subject', '=', 'subjects.id_sub')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->get();

                $userQuiz = Subjects::join('quizzes', 'quizzes.id_subject', '=', 'subjects.id_sub')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->get();

                $scheduleMonday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('users', 'subjects.id_teacher', '=', 'users.id')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 1)
                    ->get();
                $scheduleTuesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('users', 'subjects.id_teacher', '=', 'users.id')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 2)
                    ->get();
                $scheduleWednesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('users', 'subjects.id_teacher', '=', 'users.id')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 3)
                    ->get();
                $scheduleThursday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('users', 'subjects.id_teacher', '=', 'users.id')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 4)
                    ->get();
                $scheduleFriday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
                    ->join('users', 'subjects.id_teacher', '=', 'users.id')
                    ->where('subjects.id_teacher', '=', Auth::user()->id)
                    ->where('schedules.day', '=', 5)
                    ->get();

                return view('teacher.index', compact('userStudent', 'userTeacher', 'users', 'userAssignments', 'userQuiz', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday'));
            }
        }else{
            return redirect()->back();
        }
    }
}
