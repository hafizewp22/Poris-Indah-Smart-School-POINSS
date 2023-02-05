<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\ClassInfo;
use App\Models\Schedule;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentTeacherController extends Controller
{
    public function DataAssignment(){
        $userClass = Subjects::latest('name_class', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSchedule = Schedule::latest('time_start', 'DSC')
            ->join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSubject = Subjects::latest('name_subject', 'DSC')->where('id_teacher', '=', Auth::user()->id)->get();

        $userAssignments = Subjects::join('assignments', 'assignments.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        return view('teacher.assignment.data_assignment', compact('userClass', 'userSubject', 'userAssignments', 'userSchedule'));
    }

    public function SearchAssignment(Request $request){
        $userClass = Subjects::latest('name_class', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSchedule = Schedule::latest('time_start', 'DSC')
            ->join('subjects', 'schedules.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSubject = Subjects::latest('name_subject', 'DSC')->where('id_teacher', '=', Auth::user()->id)->get();

        $search_query_subject = $request->query('SearchSubject');

        $userAssignments = Subjects::join('assignments', 'assignments.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->get();

        return view('teacher.assignment.data_assignment', compact('userClass', 'userSubject', 'userAssignments', 'userSchedule'));
    }

    public function AddAssignment(Request $request) {
        $addAssignments = new Assignment();

        $request->validate([
            'title' => ['required', 'string', 'max:355'],
            'assign_date' => ['required', 'string', 'max:255'],
            'due_date' => ['required', 'string', 'max:255'],
            'file_asg' => ['required', 'mimes:pdf,doc,docx,zip,rar,jpeg,png,jpg,xlx,csv,txt,xlx,xls,pdf', 'max:2048'],
            'id_subject' => ['required', 'string', 'max:255'],
        ]);

        if ($request->file('file_asg')) {
            $file = $request->file('file_asg');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/assignment/question/'), $filename);
            $addAssignments['file_asg'] = $filename;
        }

        $addAssignments->title = $request->input('title');
        $addAssignments->assign_date = $request->input('assign_date');
        $addAssignments->due_date = $request->input('due_date');
        $addAssignments->id_subject = $request->input('id_subject');

        $addAssignments->save();
        return redirect()->back();
    }

    public function EditAssignment(){
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->where('id_teacher', '=', Auth::user()->id)->get();
        $userAssignments = Assignment::latest()->get();

        return view('teacher.assignment.data_assignment', compact('userClass', 'userSubject', 'userAssignments'));
    }

    public function UpdateAssignment(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:355'],
            'assign_date' => ['required', 'string', 'max:255'],
            'due_date' => ['required', 'string', 'max:255'],
            'id_subject' => ['required', 'string', 'max:255'],
        ]);

        $data = Assignment::find($request->id_id);

        $data->title = $request->title;
        $data->assign_date = $request->assign_date;
        $data->due_date = $request->due_date;
        $data->id_subject = $request->id_subject;

        if ($request->file('file_asg')) {
            $file = $request->file('file_asg');
            @unlink(public_path('upload/assignment/question/' . $data->file_asg));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/assignment/question/'), $filename);
            $data['file_asg'] = $filename;
        }

        $data->save();
        return redirect()->back();
    }

    public function DeleteAssignment($id){
        Assignment::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function ViewAssignment($id){
        $assignments = Assignment::join('assignment_details', 'assignment_details.id_assignment', '=', 'assignments.id_id')
            ->join('users', 'assignment_details.id_student', '=', 'users.id')
            ->where('assignment_details.id_assignment', '=', $id)
            ->get();

        $userAssignments = Assignment::findOrFail($id);

        return view('teacher.assignment.view_assignment_student', compact('userAssignments', 'assignments'));
    }

    public function ViewScore($id) {
        $assignmentDetail = Assignment::join('assignment_details', 'assignment_details.id_assignment', '=', 'assignments.id_id')
            ->join('users', 'assignment_details.id_student', '=', 'users.id')
            ->where('assignment_details.id_assignment', '=', $id)
            ->get();
        return view('teacher.assignment.data_assignment',compact('assignmentDetail'));
    }

    public function UploadScore(Request $request){
        $request->validate([
            'score' => ['required'],
        ]);

        $data = AssignmentDetail::find($request->id_id);

        $data->score = $request->score;

        $data->save();
        return redirect()->back();
    }

    public function DeleteDataAssignmentStudent($id){
        AssignmentDetail::findOrFail($id)->delete();

        return redirect()->back();
    }


}
