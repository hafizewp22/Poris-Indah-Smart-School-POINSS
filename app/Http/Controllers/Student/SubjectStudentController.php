<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\Schedule;
use App\Models\Subjects;
use App\Models\SubjectsDetail;
use App\Models\SubjectType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectStudentController extends Controller
{
    public function DataSubject(){
        $dataSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
//            ->join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userClass = ClassInfo::latest('name_class', 'ASC')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user' ,'=', Auth::user()->id)
            ->get();
        return view('student.subject.data_subject', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass'));
    }

    public function SearchSubject(Request $request){
        $search_query_class = $request->query('searchClass');

        $dataSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_details', 'subjects.id_class', '=', 'class_details.id_class')
            ->join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->where('class_infos.name_class', "LIKE", "$search_query_class%")
            ->get();

        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userClass = ClassInfo::latest('name_class', 'ASC')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user' ,'=', Auth::user()->id)
            ->get();
        return view('student.subject.data_subject', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass'));
    }

    public function viewSubject($id){
        $viewSubject = DB::table('users')
            ->join('class_details', 'users.id', '=', 'class_details.id_user')
            ->join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('subjects.id_sub', '=', $id)
            ->get();

        $userSubjectsDetail = SubjectsDetail::where('id_subject', '=', $id)->get();
        $dataSubject = Subjects::findOrFail($id);
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        return view('student.subject.data_view_subject', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass', 'viewSubject', 'userSubjectsDetail'));
    }

    public function viewSubjectStudent($id){
        $viewSubject = DB::table('users')
            ->join('class_details', 'users.id', '=', 'class_details.id_user')
            ->join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('subjects.id_sub', '=', $id)
            ->get();

        $dataSubject = Subjects::findOrFail($id);
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        return view('student.subject.data_view_student', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass', 'viewSubject'));
    }

    public function EditSubjectDetail($id){
        $userSubjectsDetail = SubjectsDetail::findOrFail($id);
        return view('student.subject.data_view_files', compact('userSubjectsDetail'));
    }
}
