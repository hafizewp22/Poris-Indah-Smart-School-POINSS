<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subjects extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sub';

    protected $table = 'subjects';
    protected $fillable = [
        'id_sub',
        'name_subject',
        'id_class',
        'id_teacher',
        'id_subject_type',
        'id_academic_year',
        'detail_material',
        'text_book',
    ];

    public function classs(){
        return $this->belongsTo(ClassInfo::class, 'id_class','id');
    }

    public function attendances(){
        return $this->belongsTo(Attendance::class, 'id_sub','id_subject');
    }

    public function academicYear(){
        return $this->belongsTo(AcademyYear::class, 'id_academic_year','id');
    }

    public function schedules(){
        return $this->belongsTo(Schedule::class, 'id_sub','id_subject');
    }

    public function classDetails(){
        return $this->belongsTo(ClassDetail::class, 'id_class','id_user');
    }

    public function classss(){
        return $this->hasMany(ClassDetail::class, 'id_class','id');
    }

    public function teachers(){
        return $this->belongsTo(User::class, 'id_teacher','id');
    }

    public function subjectType(){
        return $this->belongsTo(SubjectType::class, 'id_subject_type','id');
    }
}
