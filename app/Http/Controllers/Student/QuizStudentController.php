<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizStudentController extends Controller
{
    public function DataQuiz(){
        $userQuiz = Quiz::join('subjects', 'quizzes.id_subject', '=', 'subjects.id_sub')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->join('class_details', 'class_infos.id', '=', 'class_details.id_class')
            ->where('class_details.id_user', '=', Auth::user()->id)
            ->get();

        return view('student.quiz.data_quiz', compact('userQuiz'));
    }

    public function ViewStartQuiz($id)
    {
        $quizs = Quiz::join('quiz_details', 'quiz_details.id_quiz', '=', 'quizzes.id_id')
            ->join('users', 'quiz_details.id_student', '=', 'users.id')
            ->where('quiz_details.id_quiz', '=', $id)
            ->get();

        $userStudent = User::join('class_details', 'class_details.id_user', '=', 'users.id')
            ->join('class_infos', 'class_details.id_class', '=', 'class_infos.id')
            ->join('subjects', 'subjects.id_class', '=', 'class_infos.id')
            ->join('quizzes', 'quizzes.id_subject', '=', 'subjects.id_sub')
            ->where('quizzes.id_id', '=', $id)
            ->get();

        $userQuiz = Quiz::findOrFail($id);

        return view('student.quiz.start_quiz', compact('userQuiz', 'quizs', 'userStudent'));
    }
}
