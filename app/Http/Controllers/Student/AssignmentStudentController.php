<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentStudentController extends Controller
{
    public function DataAssignment(){
        $userAssignments = Assignment::join('subjects', 'assignments.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        return view('student.assignment.data_assignment', compact('userAssignments'));
    }

    public function InputAssignment($id){
        $userAssignments = Assignment::join('assignment_details', 'assignments.id_id', '=', 'assignment_details.id_assignment')
            ->where('assignment_details.id_assignment', '=', $id)
            ->get();

        return view('student.assignment.data_assignment', compact('userAssignments'));
    }

    public function UploadAssignment(Request $request){
        $addStudents = new AssignmentDetail();

            if ($request->file('file_assignment')) {
                $file = $request->file('file_assignment');
                @unlink(public_path('upload/assignment/students/'.$addStudents->file_assignment));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/assignment/students/'), $filename);
                $addStudents['file_assignment'] = $filename;
            }

        $addStudents->id_student = Auth::user()->id;
        $addStudents->id_assignment = $request->input('id_assignment');

        $addStudents->save();
        return redirect()->back();
    }

    public function UpdateAssignment(Request $request)
    {

        $data = AssignmentDetail::find($request->id_id);

        if ($request->file('file_assignment')) {
            $file = $request->file('file_assignment');
            @unlink(public_path('upload/assignment/students/'.$data->file_assignment));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/assignment/students/'), $filename);
            $data['file_assignment'] = $filename;
        }

        $data->save();
        return redirect()->back();
    }
}
