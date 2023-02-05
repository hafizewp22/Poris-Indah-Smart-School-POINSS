<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherDataController extends Controller
{
    public function DataTeacher(){
        $userTeacher = User::latest('name', 'ASC')->where('user_type', '=', 2)->paginate(4);
        return view('admin.teacher.data_teacher', compact('userTeacher'));
    }

    public function AddTeacher(Request $request) {
        $addTeacher = new User();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'grade' => ['required'],
            'phone' => ['required', 'string', 'min:5', 'max:25'],
        ]);

        $addTeacher->name = $request->input('name');
        $addTeacher->username = $request->input('username');
        $addTeacher->email = $request->input('email');
        $addTeacher->user_type = '0';
        $addTeacher->grade = $request->input('grade');
        $addTeacher->phone = $request->input('phone');
        $addTeacher->password = Hash::make('12345678');

        $addTeacher->save();
        return redirect()->back();
    }

    public function EditTeacher($id){
        $category = User::findOrFail($id);
        return view('admin.teacher.data_student',compact('category'));
    }

    public function UpdateTeacher(Request $request){
        $student_id = $request->id;

        User::findOrFail($student_id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'grade' => $request->grade,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }

    public function DeleteTeacher($id){
        User::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function SearchTeacher(Request $request){
        $search_query = $request->query('searchTeacher');
        $userTeacher = User::orWhere('name', "LIKE", "%$search_query%")
            ->orWhere('username', "LIKE", "%$search_query%")
            ->where('user_type', '=', 2)->paginate(4)
            ->appends(['searchTeacher'=>$search_query]);
        return view('admin.teacher.data_teacher', compact('userTeacher'));
    }
}
