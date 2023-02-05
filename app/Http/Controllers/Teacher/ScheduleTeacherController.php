<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Cancelation;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleTeacherController extends Controller
{
    public function DataSchedule(){
        $userAY = AcademyYear::latest()->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->get();
        $userSemester = Semester::latest()->get();
        $userSchedule = Schedule::latest()->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userScheduleTec = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();
        $scheduleMonday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 1)
            ->get();
        $scheduleTuesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 2)
            ->get();
        $scheduleWednesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 3)
            ->get();
        $scheduleThursday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 4)
            ->get();
        $scheduleFriday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 5)
            ->get();
        $userCancelation = Cancelation::join('schedules', 'cancelations.id_schedule', '=', 'schedules.id_sch')
            ->orWhere('cancelations.id_teacher', '=', Auth::user()->id)
            ->get();

        return view('teacher.schedule.schedule', compact('userAY', 'userScheduleTec', 'userSubject', 'userSemester', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday', 'userSchedule', 'userCancelation', 'userAcademyYear'));
    }

    public function SearchSchedule(Request $request){
        $userAY = AcademyYear::latest()->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->get();
        $userSemester = Semester::latest()->get();
        $userSchedule = Schedule::latest()->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userScheduleTec = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $search_query_ay = $request->query('searchAy');
        $search_query_semester = $request->query('searchSemester');

        $scheduleMonday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 1)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleTuesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 2)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleWednesday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 3)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleThursday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 4)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleFriday = Schedule::join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->join('users', 'subjects.id_teacher', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('schedules.day', '=', 4)
            ->where('schedules.id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('schedules.id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $userCancelation = Cancelation::join('schedules', 'cancelations.id_schedule', '=', 'schedules.id_sch')
            ->orWhere('cancelations.id_teacher', '=', Auth::user()->id)
            ->get();

        return view('teacher.schedule.schedule', compact('userAY', 'userScheduleTec', 'userSubject', 'userSemester', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday', 'userSchedule', 'userCancelation', 'userAcademyYear'));
    }

    public function AddCancelation($id){
        $userSchedule = Schedule::find($id);
        $userCancelation = Cancelation::latest()->get();
        return view('teacher.schedule.schedule',compact('userSchedule', 'userCancelation'));
    }

    public function AddCancelationInfor(Request $request) {
        $addTeachers = new Cancelation();

        $request->validate([
            'id_schedule' => ['required'],
            'reason_cancelation' => ['required', 'string'],
        ]);

        $addTeachers->id_schedule = $request->input('id_schedule');
        $addTeachers->id_teacher = Auth::user()->id;
        $addTeachers->reason_cancelation = $request->input('reason_cancelation');

        $addTeachers->save();
        return redirect()->back();
    }

    public function ViewCancelation($id){
        $userSchedule = Schedule::find($id);

        $userCancelation = Cancelation::join('schedules', 'cancelations.id_schedule', '=', 'schedules.id_sch')
            ->orWhere('cancelations.id_teacher', '=', Auth::user()->id)
            ->where('schedules.id_sch', '=', $id)
            ->get();
        return view('teacher.schedule.view_cancelation',compact( 'userCancelation', 'userSchedule'));
    }

    public function DeleteCancelation($id){
        Cancelation::findOrFail($id)->delete();

        return redirect()->back();
    }
}
