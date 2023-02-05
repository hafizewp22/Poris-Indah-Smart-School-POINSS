<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\ClassDetail;
use App\Models\Semester;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class GradeStudentController extends Controller
{
    public function DataGrade(){
        $userSubject = Subjects::join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();
        $userData = ClassDetail::join('class_infos', 'class_infos.id', '=', 'class_details.id_class')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSemester = Semester::get();

        $userSubjectUpdate = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $subject = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->where('grade_details.id_student', '=', Auth::user()->id)
            ->get();

        return view('student.grade.data_grade', compact('userSubject', 'userAcademyYear', 'userSemester', 'userData', 'userSubjectUpdate', 'subject'));
    }

    public function SearchGrade(Request $request){
        $userSubject = Subjects::join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();
        $userData = ClassDetail::join('class_infos', 'class_infos.id', '=', 'class_details.id_class')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSemester = Semester::get();

        $userSubjectUpdate = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $search_query = $request->query('search');
        $search_query_semester = $request->query('searchSemester');
        $subject = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->where('grades.id_academic_year', "LIKE", "%$search_query%")
            ->where('grades.id_semester', "LIKE", "%$search_query_semester%")
            ->where('grade_details.id_student', '=', Auth::user()->id)
            ->paginate(100)
            ->appends(['search'=>$search_query, 'searchSemester'=>$search_query_semester]);
        return view('student.grade.se_grade', compact('userSubject', 'userAcademyYear', 'userSemester', 'userData', 'userSubjectUpdate', 'subject'));
    }

    public function FilePDF(Request $request)
    {
        $userSubject = Subjects::join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();
        $userData = ClassDetail::join('class_infos', 'class_infos.id', '=', 'class_details.id_class')
            ->join('subjects', 'class_infos.id', '=', 'subjects.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();
        $userAcademyYear = AcademyYear::latest('name_academic_year', 'ASC')->get();
        $userSemester = Semester::latest('id', 'ASC')->get();

        $userSubjectUpdate = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        $search_query = $request->query('search');
        $search_query_semester = $request->query('searchSemester');
        $subject = Subjects::latest('name_subject', 'ASC')
            ->join('grades', 'subjects.id_sub', '=', 'grades.id_subject')
            ->join('grade_details', 'grades.id_grade', '=', 'grade_details.id_grade')
            ->join('academy_years', 'grades.id_academic_year', '=', 'academy_years.id')
            ->join('semesters', 'grades.id_semester', '=', 'semesters.id')
            ->where('grades.id_academic_year', "LIKE", "%$search_query%")
            ->where('grades.id_semester', "LIKE", "%$search_query_semester%")
            ->where('grade_details.id_student', '=', Auth::user()->id)
            ->paginate(100)
            ->appends(['search'=>$search_query, 'searchSemester'=>$search_query_semester]);

        $pdf = PDF::loadview('student.grade.pdf',['subject'=>$subject]);
        return $pdf->download('grade.pdf', compact('userSubject', 'userAcademyYear', 'userSemester', 'userData', 'userSubjectUpdate', 'subject'));
    }
}
