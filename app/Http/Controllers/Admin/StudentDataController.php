<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentDataController extends Controller
{
    public function DataStudent(){
        $userStudent = User::latest('name', 'ASC')->where('user_type', '=', 0)->simplePaginate(4);
        return view('admin.student.data_student', compact('userStudent'));
    }

    public function AddStudent(Request $request) {
        $addStudents = new User();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'grade' => ['required'],
            'phone' => ['required', 'string', 'min:5', 'max:25'],
        ]);

        $addStudents->name = $request->input('name');
        $addStudents->username = $request->input('username');
        $addStudents->email = $request->input('email');
        $addStudents->user_type = '0';
        $addStudents->grade = $request->input('grade');
        $addStudents->phone = $request->input('phone');
        $addStudents->password = Hash::make('12345678');

        $addStudents->save();
        return redirect()->back();
    }

    public function EditStudent($id){
        $category = User::findOrFail($id);
        return view('admin.student.data_student',compact('category'));
    }

    public function UpdateStudent(Request $request){
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

    public function DeleteStudent($id){
        User::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function SearchStudent(Request $request){
        $search_query = $request->query('searchStudent');
        $userStudent = User::orWhere('name', "LIKE", "%$search_query%")
            ->orWhere('username', "LIKE", "%$search_query%")
            ->where('user_type', '=', 0)
            ->paginate(4)
            ->appends(['searchStudent'=>$search_query]);
        return view('admin.student.data_student', compact('userStudent'));
    }

}
