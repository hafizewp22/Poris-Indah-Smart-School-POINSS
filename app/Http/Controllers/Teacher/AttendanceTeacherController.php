<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\AssignmentDetail;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\ClassInfo;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceTeacherController extends Controller
{
    public function DataAttendance(){
        $userSubject = Subjects::get();
        $userClass = Subjects::join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSchedule = Schedule::latest('time_start', 'DSC')
            ->join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $dataAttendanceInput = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('attendances.done', '=', '0')
            ->get();

        $dataAttendanceOutput = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->orWhere('subjects.id_teacher', '=', Auth::user()->id)
            ->where('attendances.done', '=', '1')
            ->get();

        $userSubject = Subjects::latest('name_subject', 'DSC')->where('id_teacher', '=', Auth::user()->id)->get();

        return view('teacher.attendance.data_attendance', compact('userSchedule', 'dataAttendanceInput', 'dataAttendanceOutput', 'userClass', 'userSubject'));
    }

    public function SearchAttendance(Request $request){
        $userClass = Subjects::join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSubject = Subjects::latest('name_subject', 'DSC')->where('id_teacher', '=', Auth::user()->id)->get();

        $userSchedule = Schedule::latest('time_start', 'DSC')
            ->join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $search_query_subject = $request->query('SearchSubject');

        $dataAttendanceInput = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('attendances.done', '=', '0')
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->get();

        $dataAttendanceOutput = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->where('attendances.done', '=', '1')
            ->get();

        return view('teacher.attendance.data_attendance', compact('userSchedule', 'dataAttendanceInput', 'dataAttendanceOutput', 'userClass', 'userSubject'));
    }

    public function AddAttendance(Request $request) {
        $addAttendances = new Attendance();

        $request->validate([
            'id_subject' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
        ]);

        $addAttendances->id_subject = $request->input('id_subject');
        $addAttendances->date = $request->input('date');
        $addAttendances->time = $request->input('time');
        $addAttendances->done ='0';

        $addAttendances->save();
        return redirect()->back();
    }

    public function DeleteAttendance($id){
        Attendance::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function InputAttendance($id){
        $dataAttendance = Attendance::findOrFail($id);
        $dataAttendanceDe = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->findOrFail($id);

        $dataAttendanceTa = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('attendances.id_atte', '=', $id)
            ->get();

        return view('teacher.attendance.data_attendance_detail', compact('dataAttendanceDe', 'dataAttendance', 'dataAttendanceTa'));
    }

    public function DetailAttendance($id){
        $dataAttendance = Attendance::findOrFail($id);

        $dataAttendanceDe = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->findOrFail($id);

        $dataAttendanceTa = AttendanceDetail::join('attendances', 'attendances.id_atte', '=', 'attendance_details.id_atte')
            ->join('attendance_types', 'attendance_details.id_atte_type', '=', 'attendance_types.id_atte_type')
            ->join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('attendances.id_atte', '=', $id)
            ->get();

        return view('teacher.attendance.data_view_attendance_detail', compact('dataAttendanceDe', 'dataAttendance', 'dataAttendanceTa'));
    }

    public function AddAttendanceDetail(Request $request) {
        foreach($request->get('id_atte') as $index => $value) {
            AttendanceDetail::create([
                'id_atte' => $value,
                'id_student' => $request->get('id_student')[$index],
                'id_atte_type' =>$request->get('id_atte_type')[$index],
                'note' => $request->get('note')[$index]
            ]);
        }

        Attendance::where('id_atte', $request->id_atte)->first()->update([
            'done' => '1'
        ]);


        return redirect('teacher/data-attendance');
    }
}
