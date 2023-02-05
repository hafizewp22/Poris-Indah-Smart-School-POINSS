<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sub_detail';
    protected $table = 'subjects_details';
    protected $fillable = [
        'id_sub_detail',
        'id_subject',
        'start_date',
        'time',
        'title',
        'sub_topics',
        'room',
        'file_material',
    ];

    public function subjects(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }

    public function schedules(){
        return $this->belongsTo(Schedule::class, 'time','id_sch');
    }
}
