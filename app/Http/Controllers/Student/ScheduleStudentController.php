<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleStudentController extends Controller
{
    public function DataSchedule(){
        $userAY = AcademyYear::latest()->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->get();
        $userSemester = Semester::latest()->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSchedule = Schedule::latest()->get();
        $userScheduleTec = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->orWhere('users.id', '=', Auth::user()->id)
            ->where('schedules.day', '=', 1)
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

        return view('student.schedule.schedule', compact('userAY', 'userScheduleTec', 'userSubject', 'userSemester', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday', 'userSchedule', 'userAcademyYear'));
    }

    public function SearchSchedule(Request $request){
        $userAY = AcademyYear::latest()->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->get();
        $userSemester = Semester::latest()->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSchedule = Schedule::latest()->get();
        $userScheduleTec = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->orWhere('users.id', '=', Auth::user()->id)
            ->where('schedules.day', '=', 1)
            ->get();

        $search_query_ay = $request->query('searchAy');
        $search_query_semester = $request->query('searchSemester');

        $scheduleMonday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->where('schedules.day', '=', 1)
            ->get();
        $scheduleTuesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->where('schedules.day', '=', 2)
            ->get();
        $scheduleWednesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->where('schedules.day', '=', 3)
            ->get();
        $scheduleThursday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->where('schedules.day', '=', 4)
            ->get();
        $scheduleFriday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_details.id_class', '=', 'class_infos.id')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->where('schedules.day', '=', 5)
            ->get();

        return view('student.schedule.schedule', compact('userAY', 'userScheduleTec', 'userSubject', 'userSemester', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday', 'userSchedule', 'userAcademyYear'));
    }

}
