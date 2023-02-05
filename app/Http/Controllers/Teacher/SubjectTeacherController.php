<?php

namespace App\Http\Controllers\Teacher;

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

class SubjectTeacherController extends Controller
{
    public function DataSubject(){
        $userClass = Subjects::latest('name_class', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $dataSubjects = Subjects::latest('name_subject', 'ASC')->where('id_teacher', '=', Auth::user()->id)->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->where('id_teacher', '=', Auth::user()->id)->get();
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        return view('teacher.subject.data_subject', compact('userSubject', 'userTeacher', 'userSubjectType', 'userClass', 'dataSubjects'));
    }

    public function SearchSubject(Request $request){
        $search_query_subject = $request->query('SearchSubject');

        $userClass = Subjects::latest('name_class', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $dataSubjects = Subjects::latest('name_subject', 'ASC')
            ->where('id_teacher', '=', Auth::user()->id)
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->get();

        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->where('id_teacher', '=', Auth::user()->id)
            ->get();
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        return view('teacher.subject.data_subject', compact('userSubject', 'userTeacher', 'userSubjectType', 'userClass', 'dataSubjects'));
    }

    public function viewSubject($id){
        $viewSubject = DB::table('users')
            ->join('class_details', 'users.id', '=', 'class_details.id_user')
            ->join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('subjects.id_sub', '=', $id)
            ->get();

        $dataSubject = Subjects::findOrFail($id);
        $userSchedule = Schedule::latest('time_start', 'DSC')->where('id_subject', '=', $id)->get();
        $userSubjectsDetail = SubjectsDetail::where('id_subject', '=', $id)->get();
        $userSubject = Subjects::latest()->where('id_sub', '=', $id)->get();
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        return view('teacher.subject.data_view_subject', compact('dataSubject', 'userSubjectsDetail','userTeacher', 'userSubjectType', 'userClass', 'viewSubject', 'userSubject', 'userSchedule'));
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
        return view('teacher.subject.data_view_student', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass', 'viewSubject'));
    }

    public function UploadSubjectDetail(Request $request){
        $addSubjectDetail= new SubjectsDetail();

        $request->validate([
            'id_subject' => ['required'],
            'start_date' => ['required'],
            'time' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'sub_topics' => ['required', 'string'],
            'room' => ['required', 'string'],
            'file_material' => ['required', 'mimes:pdf,doc,docx,jpeg,png,jpg,xlx,csv,txt,xlx,xls,pdf', 'max:2048'],
        ]);

        $addSubjectDetail->id_subject = $request->input('id_subject');
        $addSubjectDetail->start_date = $request->input('start_date');
        $addSubjectDetail->time = $request->input('time');
        $addSubjectDetail->title = $request->input('title');
        $addSubjectDetail->sub_topics = $request->input('sub_topics');
        $addSubjectDetail->room = $request->input('room');

        if ($request->file('file_material')) {
            $file = $request->file('file_material');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/material/'), $filename);
            $addSubjectDetail['file_material'] = $filename;
        }

        $addSubjectDetail->save();
        return redirect()->back();
    }

    public function EditSubjectDetail($id){
        $userSubjectsDetail = SubjectsDetail::findOrFail($id);
        return view('teacher.subject.data_view_files_new', compact('userSubjectsDetail'));
    }

    public function UpdateSubjectDetail(Request $request)
    {
        $request->validate([
            'start_date' => ['required'],
            'time' => ['required'],
            'title' => ['required', 'string', 'max:255'],
            'sub_topics' => ['required', 'string'],
            'file_material' => ['mimes:pdf,doc,docx,jpeg,png,jpg,xlx,csv,txt,xlx,xls,pdf', 'max:2048'],
        ]);

        $data = SubjectsDetail::find($request->id_sub_detail);

        $data->start_date = $request->start_date;
        $data->time = $request->time;
        $data->title = $request->title;
        $data->sub_topics = $request->sub_topics;

        if ($request->file('file_material')) {
            $file = $request->file('file_material');
            @unlink(public_path('upload/material/' . $data->file_material));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/material/'), $filename);
            $data['file_material'] = $filename;
        }

        $data->save();
        return redirect()->back();
    }
}
