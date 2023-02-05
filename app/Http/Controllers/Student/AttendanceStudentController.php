<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceStudentController extends Controller
{
    public function DataAttendance(){

        $userAttendances = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        return view('student.attendance.data_attendance', compact('userAttendances', 'userSubject'));
    }

    public function SearchAttendance(Request $request){
        $search_query_subject = $request->query('SearchSubject');

        $userAttendances = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->get();

        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        return view('student.attendance.data_attendance', compact('userAttendances', 'userSubject'));
    }

    public function ViewAttendance($id){
        $dataAttendance = Subjects::findOrFail($id);
        $dataAttendanceDe = Attendance::join('subjects', 'attendances.id_subject', '=', 'subjects.id_sub')
            ->join('attendance_details', 'attendances.id_atte', '=', 'attendance_details.id_atte')
            ->where('attendance_details.id_student', '=', Auth::user()->id)
            ->where('attendances.id_subject', '=', $id)
            ->get();

        return view('student.attendance.view_attendance', compact( 'dataAttendance', 'dataAttendanceDe'));
    }
}
