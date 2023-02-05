<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Cancelation;
use App\Models\ClassInfo;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleDataController extends Controller
{
    public function DataSchedule(){
        $userAY = AcademyYear::latest()->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->get();
        $userSemester = Semester::latest()->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSchedule = Schedule::latest()->get();
        $scheduleMonday = Schedule::latest()->where('day', '=', 1)->get();
        $scheduleTuesday = Schedule::latest()->where('day', '=', 2)->get();
        $scheduleWednesday = Schedule::latest()->where('day', '=', 3)->get();
        $scheduleThursday = Schedule::latest()->where('day', '=', 4)->get();
        $scheduleFriday = Schedule::latest()->where('day', '=', 5)->get();

        return view('admin.schedule.data_schedule', compact('userAY', 'userSubject', 'userSemester', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday', 'userSchedule', 'userAcademyYear'));
    }

    public function SearchSchedule(Request $request){
        $userAY = AcademyYear::latest()->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->get();
        $userSemester = Semester::latest()->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSchedule = Schedule::latest()->get();

        $search_query_ay = $request->query('searchAy');
        $search_query_semester = $request->query('searchSemester');

        $scheduleMonday = Schedule::latest()
            ->where('day', '=', 1)
            ->where('id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('id_semester', "LIKE", "$search_query_semester% ")
            ->get();
        $scheduleTuesday = Schedule::latest()
            ->where('day', '=', 2)
            ->where('id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleWednesday = Schedule::latest()
            ->where('day', '=', 3)
            ->where('id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleThursday =Schedule::latest()
            ->where('day', '=', 4)
            ->where('id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('id_semester', "LIKE", "%$search_query_semester%")
            ->get();
        $scheduleFriday = Schedule::latest()
            ->where('day', '=', 5)
            ->where('id_academic_year', "LIKE", "%$search_query_ay%")
            ->where('id_semester', "LIKE", "%$search_query_semester%")
            ->get();

        return view('admin.schedule.data_schedule', compact('userAY', 'userSubject', 'userSemester', 'scheduleMonday', 'scheduleTuesday', 'scheduleWednesday', 'scheduleThursday', 'scheduleFriday', 'userSchedule', 'userAcademyYear'));
    }

    public function AddSchedule(Request $request) {
        $addSchedules = new Schedule();

        $request->validate([
            'id_academic_year' => ['required'],
            'day' => ['required', 'string', 'max:255'],
            'time_start' => ['required', 'string', 'max:255'],
            'time_off' => ['required', 'string', 'max:255'],
            'id_subject' => ['required'],
            'id_semester' => ['required'],
        ]);

        $addSchedules->id_academic_year = $request->input('id_academic_year');
        $addSchedules->day = $request->input('day');
        $addSchedules->time_start = $request->input('time_start');
        $addSchedules->time_off = $request->input('time_off');
        $addSchedules->id_subject = $request->input('id_subject');
        $addSchedules->id_semester = $request->input('id_semester');

        $addSchedules->save();
        return redirect()->back();
    }

    public function EditSchedule($id){
        $userSchedule = Schedule::find($id);
        return view('admin.schedule.data_schedule',compact('userSchedule'));
    }

    public function UpdateSchedule(Request $request){
        $schedule_id = $request->id_sch;

        Schedule::findOrFail($schedule_id)->update([
            'id_academic_year' => $request->id_academic_year,
            'day' => $request->day,
            'time_start' => $request->time_start,
            'time_off' => $request->time_off,
            'id_subject' => $request->id_subject,
            'id_semester' => $request->id_semester,
        ]);

        return redirect()->back();
    }

    public function DeleteSchedule($id){
        Schedule::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function ViewCancelation($id){
        $userSchedule = Schedule::find($id);

        $userCancelation = Cancelation::join('schedules', 'cancelations.id_schedule', '=', 'schedules.id_sch')
            ->where('schedules.id_sch', '=', $id)
            ->get();
        return view('admin.schedule.view_cancelation',compact( 'userCancelation', 'userSchedule'));
    }

    public function DeleteCancelation($id){
        Cancelation::findOrFail($id)->delete();

        return redirect()->back();
    }
}
