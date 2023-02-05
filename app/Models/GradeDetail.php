<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_grade_detail';
    protected $table = 'grade_details';
    protected $fillable = [
        'id_grade_detail',
        'id_grade',
        'id_student',
        'quiz',
        'assignment',
        'd_t',
        'min_text',
        'final_text',
        'total',
    ];

    public function setTotalAttribute()
    {
        return $this->attributes['total'] = ($this->attributes['quiz'] + $this->attributes['assignment'] + $this->attributes['d_t'] + $this->attributes['min_text'] + $this->attributes['final_text']) / 5;
    }

    public function grades(){
        return $this->belongsTo(Grade::class, 'id_grade','id_grade');
    }

    public function students(){
        return $this->belongsTo(User::class, 'id_student','id');
    }
}
