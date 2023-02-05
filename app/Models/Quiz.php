<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_id';
    protected $table = 'quizzes';
    protected $fillable = [
        'id_id',
        'id_subject',
        'title',
        'assign_date',
        'due_date',
        'link',
    ];

    public function subjects(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }

    public function nulls(){
        return $this->hasMany(QuizDetail::class, 'id_quiz', 'id_id')
                ->where('quiz_details.id_student', '=', Auth::user()->id)
                ->first() === null;
    }

    public function quiz(){
        return $this->belongsTo(QuizDetail::class, 'id_id','id_quiz');
    }

    public function quizs(){
        return $this->hasMany(QuizDetail::class, 'id_quiz','id_id')
            ->where('quiz_details.id_student', '=', Auth::user()->id);
    }

}
