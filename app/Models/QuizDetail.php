<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class QuizDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_id';
    protected $table = 'quiz_details';
    protected $fillable = [
        'id_quiz',
        'id_student',
        'score',
    ];



}
