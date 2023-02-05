<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_grade';
    protected $table = 'grades';
    protected $fillable = [
        'id_grade',
        'id_subject',
        'id_academic_year',
        'id_semester',
        'min_score',
        'done',
    ];

    public function subjects(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }

    public function academicYear(){
        return $this->belongsTo(AcademyYear::class, 'id_academic_year','id');
    }

    public function semesters(){
        return $this->belongsTo(Semester::class, 'id_semester','id');
    }

    public function details(){
        return $this->hasMany(GradeDetail::class, 'id_grade','id_grade');
    }
}
