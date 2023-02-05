<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sch';
    protected $table = 'schedules';
    protected $fillable = [
        'id_sch',
        'id_academic_year',
        'day',
        'time_start',
        'time_off',
        'id_subject',
        'id_semester',
    ];

    public function academicYear(){
        return $this->belongsTo(AcademyYear::class, 'id_academic_year','id');
    }

    public function subjects(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }

    public function semesters(){
        return $this->belongsTo(Semester::class, 'id_semester','id');
    }
}
