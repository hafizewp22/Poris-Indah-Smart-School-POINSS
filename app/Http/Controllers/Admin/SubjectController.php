<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\ClassInfo;
use App\Models\Subjects;
use App\Models\SubjectType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function DataSubject(){
        $dataSubject = Subjects::latest('name_subject', 'ASC')
//            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->get();
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userAcademyYears = AcademyYear::get();
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        return view('admin.subject.data_subject', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass', 'userAcademyYears'));
    }

    public function SearchSubject(Request $request){
        $search_query_class = $request->query('SearchClass');
        $search_query_ay = $request->query('SearchAcademyYear');
        $dataSubject = Subjects::latest('name_subject', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('class_infos.name_class', "LIKE", "$search_query_class%")
            ->where('subjects.id_academic_year', "LIKE", "%$search_query_ay%")
            ->get();
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->get();
        $userAcademyYears = AcademyYear::get();
        $userSubjectType = SubjectType::latest('subject_type', 'ASC')->get();
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        return view('admin.subject.data_subject', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass', 'userAcademyYears'));
    }

    public function AddSubject(Request $request) {
        $addSubjects= new Subjects();

        $request->validate([
            'name_subject' => ['required', 'string', 'max:255'],
            'id_class' => ['required'],
            'id_teacher' => ['required'],
            'id_subject_type' => ['required'],
            'id_academic_year' => ['required'],
            'detail_material' => ['required', 'string', 'min:5'],
            'text_book' => ['required', 'string', 'min:5'],
        ]);

        $addSubjects->name_subject = $request->input('name_subject');
        $addSubjects->id_class  = $request->input('id_class');
        $addSubjects->id_teacher = $request->input('id_teacher');
        $addSubjects->id_subject_type = $request->input('id_subject_type');
        $addSubjects->id_academic_year = $request->input('id_academic_year');
        $addSubjects->detail_material = $request->input('detail_material');
        $addSubjects->text_book = $request->input('text_book');

        $addSubjects->save();
        return redirect()->back();
    }

    public function EditSubject($id){
        $userClass = Subjects::find($id);
        return view('admin.subject.data_subject',compact('userClass'));
    }

    public function viewSubject($id){
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
        return view('admin.subject.data_view_subject', compact('dataSubject', 'userTeacher', 'userSubjectType', 'userClass', 'viewSubject'));
    }

    public function UpdateSubject(Request $request){
        $subject_id = $request->id_sub;

        Subjects::findOrFail($subject_id)->update([
            'name_subject' => $request->name_subject,
            'id_class' => $request->id_class,
            'id_teacher' => $request->id_teacher,
            'id_subject_type' => $request->id_subject_type,
            'id_academic_year' => $request->id_academic_year,
            'detail_material' => $request->detail_material,
            'text_book' => $request->text_book,
        ]);

        return redirect()->back();
    }

    public function DeleteSubject($id){
        Subjects::findOrFail($id)->delete();

        return redirect()->back();
    }
}
