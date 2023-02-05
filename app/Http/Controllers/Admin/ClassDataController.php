<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\ClassDetail;
use App\Models\ClassInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClassDataController extends Controller
{
    //Class
    public function DataClass(Request $request){
        $search_query = $request->query('search');

        $userStudent = User::latest('name', 'ASC')->get();
        $userTeacher = User::latest('name', 'ASC')->get();
        $userAY = AcademyYear::latest('created_at', 'ASC')->get();
        $userClass = ClassInfo::orWhere('name_class', "LIKE", "%$search_query%")->orWhere('major', "LIKE", "%$search_query%")->paginate(5)->appends(['search'=>$search_query]);
        return view('admin.class.data_class', compact('userClass', 'userStudent', 'userAY', 'userTeacher'));
    }

    public function AddClass(Request $request) {
        $addStudents = new ClassInfo();

        $request->validate([
            'name_class' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', 'max:255'],
        ]);

        $addStudents->name_class = $request->input('name_class');
        $addStudents->major = $request->input('major');
        $addStudents->id_teacher = $request->input('id_teacher');

        $addStudents->save();
        return redirect()->back();
    }

    public function DeleteClass($id){
        ClassInfo::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function EditClass($id){
        $userClass = ClassInfo::findOrFail($id);
        return view('admin.class.data_class',compact('userClass'));
    }

    public function updateClass(Request $request){
        $clsss_id = $request->id;

        ClassInfo::findOrFail($clsss_id)->update([
            'name_class' => $request->name_class,
            'major' => $request->major,
            'id_teacher' => $request->id_teacher,
        ]);

        return redirect()->back();
    }

//    public function SearchClass(Request $request){
//        $search_query = $request->query('search');
//        $userStudent = User::latest('name', 'ASC')->get();
//        $userTeacher = User::latest('name', 'ASC')->get();
//        $userAY = AcademyYear::latest('created_at', 'ASC')->get();
//        $userClass = ClassInfo::orWhere('name_class', "LIKE", "%$search_query%")->orWhere('major', "LIKE", "%$search_query%")->paginate(5)->appends(['search'=>$search_query]);
//        return view('admin.class.data_class', compact('userClass', 'userStudent', 'userAY', 'userTeacher'));
//    }


    //Data Student in Class
    public function AddClassStudent(Request $request) {
        $addClassStudent = new ClassDetail();

        $request->validate([
            'id_user' => ['required'],
            'id_class' => ['required'],
        ]);

        $addClassStudent->id_user = $request->input('id_user');
        $addClassStudent->id_class = $request->input('id_class');

        $addClassStudent->save();
        return redirect()->back();
    }

    public function viewClassStudent($id){
        $data = ClassInfo::find($id);
        $viewClassStudent = $data->classs()->get();

        $userStudent = User::latest('name', 'ASC')->get();
        $userClassDe = ClassInfo::latest('created_at', 'ASC')->get();
        $userClass = ClassInfo::find($id);
        return view('admin.class.data_view_class', compact('viewClassStudent', 'data', 'userStudent', 'userClass', 'userClassDe'));
    }

    public function updateClassStudent(Request $request){
        $clssStudent_id = $request->id;

        ClassDetail::findOrFail($clssStudent_id)->update([
            'id_user' => $request->id_user,
            'id_class' => $request->id_class,
        ]);

        return redirect()->back();
    }

    public function DeleteClassStudent($id){
        ClassDetail::findOrFail($id)->delete();

        return redirect()->back();
    }


    // Academy Year
    public function AddAY(Request $request) {
        $addStudents = new AcademyYear();

        $request->validate([
            'name_academic_year' => ['required', 'string', 'max:255'],
        ]);

        $addStudents->name_academic_year = $request->input('name_academic_year');

        $addStudents->save();
        return redirect()->back();
    }

    public function DeleteAY($id){
        AcademyYear::findOrFail($id)->delete();

        return redirect()->back();
    }
}


