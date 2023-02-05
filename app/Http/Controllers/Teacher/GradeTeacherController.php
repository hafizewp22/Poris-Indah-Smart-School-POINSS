<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\ClassDetail;
use App\Models\ClassInfo;
use App\Models\Grade;
use App\Models\GradeDetail;
use App\Models\Semester;
use App\Models\SubjectDetail;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class GradeTeacherController extends Controller
{

    // Halaman Utama
    public function DataGrade(){
        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->where('id_teacher', '=', Auth::user()->id)
            ->get();
        $userData = ClassDetail::join('class_infos', 'class_infos.id', '=', 'class_details.id_class')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSemester = Semester::get();

        $userSubjectUpdate = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')

            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        return view('teacher.grade.data_grade', compact('userSubject', 'userAcademyYear', 'userSemester', 'userData', 'userSubjectUpdate'));
    }

    // Search Grade
    public function SearchGrade(Request $request){
        $search_query_academyYear = $request->query('academyYear');
        $search_query_semester = $request->query('searchSemester');

        $userSubject = Subjects::latest('name_subject', 'ASC')
            ->where('id_teacher', '=', Auth::user()->id)
            ->get();
        $userData = ClassDetail::join('class_infos', 'class_infos.id', '=', 'class_details.id_class')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSemester = Semester::get();

        $userSubjectUpdate = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->where('grades.id_academic_year', "LIKE", "%$search_query_academyYear%")
            ->where('grades.id_semester', "LIKE", "%$search_query_semester%")
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        return view('teacher.grade.data_grade', compact('userSubject', 'userAcademyYear', 'userSemester', 'userData', 'userSubjectUpdate'));
    }

    // Add Grade dari setiap kelas
    public function AddGrade(Request $request) {
        $addGrade = new Grade();

        $request->validate([
            'id_subject' => ['required'],
            'id_academic_year' => ['required'],
            'id_semester' => ['required'],
            'min_score' => ['required'],
            ]);

        $addGrade->id_subject = $request->input('id_subject');
        $addGrade->id_academic_year = $request->input('id_academic_year');
        $addGrade->id_semester = $request->input('id_semester');
        $addGrade->min_score = $request->input('min_score');
        $addGrade->done = '0';

        $addGrade->save();
        return redirect()->back();
    }

    // View Final Grade
    public function ViewGrade($id){
        $subjectBefore = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();

        $subjectAfter = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('users', 'grade_details.id_student', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();
        $userGrades = Grade::findOrFail($id);

        return view('teacher.grade.final.view_grade', compact('userGrades', 'subjectAfter', 'subjectBefore'));
    }

    // Download Grade Final
    public function FileViewGradePDF($id){
        $subjectAfter = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('users', 'grade_details.id_student', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();
        $userGrades = Grade::findOrFail($id);

        $pdf = PDF::loadview('teacher.grade.final.pdf',['userGrades'=>$userGrades, 'subjectAfter'=>$subjectAfter]);
        return $pdf->download('grade.final.pdf', compact('userGrades', 'subjectAfter'));
    }

    // View mid test
    public function MiddleViewGrade($id){
        $subjectBefore = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->join('users', 'class_details.id_user', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();

        $subjectAfter = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('users', 'grade_details.id_student', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();
        $userGrades = Grade::findOrFail($id);

        return view('teacher.grade.middle.view_grade', compact('userGrades', 'subjectAfter', 'subjectBefore'));
    }

    // Download Mid Test Final
    public function FileMiddleViewGradePDF($id){
        $subjectAfter = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('users', 'grade_details.id_student', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();
        $userGrades = Grade::findOrFail($id);

        $pdf = PDF::loadview('teacher.grade.middle.pdf',['userGrades'=>$userGrades, 'subjectAfter'=>$subjectAfter]);
        return $pdf->download('grade.middle.pdf', compact('userGrades', 'subjectAfter'));
    }

    // Halaman Add Grade (Menambah data nilai siswa)
    public function AddDataGrade($id){
        $subject = ClassDetail::join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();

        $userGrades = Grade::findOrFail($id);

        return view('teacher.grade.home.add_grade', compact('userGrades', 'subject'));
    }

    // Halaman Edit Grade (edit data nilai siswa)
    public function EditDataGrade($id){
        $subject = Grade::join('subjects', 'grades.id_subject', '=', 'subjects.id_sub')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('users', 'grade_details.id_student', '=', 'users.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('grades.id_grade', '=', $id)
            ->get();

        $userGrades = Grade::findOrFail($id);

        return view('teacher.grade.home.edit_grade', compact('userGrades', 'subject'));
    }

    // Update grade dari setiap kelas
    public function UploadGrade(Request $request){
        $request->validate([
            'id_academic_year' => ['required'],
            'id_semester' => ['required'],
            'min_score' => ['required'],
        ]);

        $data = Grade::find($request->id_grade);

        $data->id_academic_year = $request->id_academic_year;
        $data->id_semester = $request->id_semester;
        $data->min_score = $request->min_score;

        $data->save();
        return redirect()->back();
    }

    // Add/Upload nilai dari setiap siswa
    public function UploadAddGradeStudent(Request $request){
//        $request->validate([
//            'id_grade' => ['required'],
//            'id_student' => ['required'],
//            'quiz' => ['required'],
//            'assignment' => ['required'],
//            'd_t' => ['required'],
//            'min_text' => ['required'],
//            'final_text' => ['required'],
//            'total' => ['required'],
//        ]);

        foreach($request->get('id_grade') as $index => $value) {
            GradeDetail::create([
                'id_grade' => $value,
                'id_student' => $request->get('id_student')[$index],
                'quiz' =>$request->get('quiz')[$index],
                'assignment' => $request->get('assignment')[$index],
                'd_t' => $request->get('d_t')[$index],
                'min_text' => $request->get('min_text')[$index],
                'final_text' => $request->get('final_text')[$index],
                'total' => $request->get('total')[$index],
            ]);
        }

        Grade::where('id_grade', $request->id_grade)->first()->update([
            'done' => '1'
        ]);

        return redirect('teacher/data-grade');
    }

    // Update nilai dari setiap siswa
    public function UpdateEditGradeStudent(Request $request){
        foreach($request->id_grade_detail as $index => $value) {
            $grade_detail = GradeDetail::find($value);
            if ($grade_detail) {
                $grade_detail->quiz = $request->quiz[$index];
                $grade_detail->assignment = $request->assignment[$index];
                $grade_detail->min_text = $request->min_text[$index];
                $grade_detail->d_t = $request->quiz[$index];
                $grade_detail->final_text = $request->final_text[$index];
                $grade_detail->total = $request->total[$index];

                $grade_detail->save();
            }
        }

        return redirect('teacher/data-grade');
    }
}
