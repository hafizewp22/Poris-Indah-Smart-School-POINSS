<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\Quiz;
use App\Models\QuizDetail;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizTeacherController extends Controller
{
    public function DataQuiz()
    {
        $userQuiz = Subjects::join('quizzes', 'quizzes.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userClass = Subjects::latest('name_class', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSubject = Subjects::latest('name_subject', 'ASC')->where('id_teacher', '=', Auth::user()->id)->get();

        return view('teacher.quiz.quiz', compact('userSubject', 'userQuiz', 'userClass'));
    }

    public function SearchQuiz(Request $request)
    {
        $search_query_subject = $request->query('SearchSubject');

        $userQuiz = Subjects::join('quizzes', 'quizzes.id_subject', '=', 'subjects.id_sub')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->where('subjects.id_sub', "LIKE", "%$search_query_subject%")
            ->get();

        $userClass = Subjects::latest('name_class', 'ASC')
            ->join('class_infos', 'subjects.id_class', '=', 'class_infos.id')
            ->where('subjects.id_teacher', '=', Auth::user()->id)
            ->get();

        $userSubject = Subjects::latest('name_subject', 'ASC')->where('id_teacher', '=', Auth::user()->id)->get();

        return view('teacher.quiz.quiz', compact('userSubject', 'userQuiz', 'userClass'));
    }

    public function AddQuiz(Request $request)
    {
        $addQuizs = new Quiz();

        $request->validate([
            'id_subject' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:355'],
            'assign_date' => ['required', 'string', 'max:255'],
            'due_date' => ['required', 'string', 'max:255'],
            'link' => ['required'],
        ]);

        $addQuizs->id_subject = $request->input('id_subject');
        $addQuizs->title = $request->input('title');
        $addQuizs->assign_date = $request->input('assign_date');
        $addQuizs->due_date = $request->input('due_date');
        $addQuizs->link = $request->input('link');

        $addQuizs->save();
        return redirect()->back();
    }

    public function EditQuiz()
    {
        $userClass = ClassInfo::latest('name_class', 'ASC')->get();
        $userSubject = Subjects::latest('name_subject', 'ASC')->where('id_teacher', '=', Auth::user()->id)->get();
        $userQuiz = Quiz::latest()->get();
        $userQuizDetail = QuizDetail::latest()->get();

        return view('teacher.assignment.data_assignment', compact('userClass', 'userSubject', 'userQuiz', 'userQuizDetail'));
    }

    public function UpdateQuiz(Request $request)
    {
        $request->validate([
            'id_subject' => ['required', 'string', 'max:355'],
            'title' => ['required', 'string', 'max:255'],
            'assign_date' => ['required', 'string', 'max:255'],
            'due_date' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string'],
        ]);

        $data = Quiz::find($request->id_id);

        $data->id_subject = $request->id_subject;
        $data->title = $request->title;
        $data->assign_date = $request->assign_date;
        $data->due_date = $request->due_date;
        $data->link = $request->link;

        $data->save();
        return redirect()->back();
    }

    public function DeleteQuiz($id)
    {
        Quiz::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function ViewQuiz($id)
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

        return view('teacher.quiz.view_quiz_student', compact('userQuiz', 'quizs', 'userStudent'));
    }

    public function AddScoreQuiz(Request $request)
    {
        $addQuizDetail = new QuizDetail();

        $request->validate([
            'id_quiz' => ['required', 'string', 'max:255'],
            'id_student' => ['required', 'string', 'max:355'],
            'score' => ['required'],
        ]);

        $addQuizDetail->id_quiz = $request->input('id_quiz');
        $addQuizDetail->id_student = $request->input('id_student');
        $addQuizDetail->score = $request->input('score');

        $addQuizDetail->save();
        return redirect()->back();
    }

    public function UpdateScoreQuiz(Request $request)
    {
        $request->validate([
            'id_student' => ['required', 'string', 'max:355'],
            'score' => ['required'],
        ]);

        $data = QuizDetail::find($request->id_id);

        $data->id_student = $request->id_student;
        $data->score = $request->score;

        $data->save();
        return redirect()->back();
    }

    public function DeleteScoreQuiz($id)
    {
        QuizDetail::findOrFail($id)->delete();

        return redirect()->back();
    }
}
