<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Assignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_id';

    protected $table = 'assignments';
    protected $fillable = [
        'id_id',
        'title',
        'assign_date',
        'due_date',
        'file_asg',
        'id_subject',
    ];

    public function assignments(){
        return $this->hasMany(AssignmentDetail::class, 'id_assignment', 'id_id')
            ->where('assignment_details.id_student', '=', Auth::user()->id);
    }

    public function nulls(){
        return $this->hasMany(AssignmentDetail::class, 'id_assignment', 'id_id')
                ->where('assignment_details.id_student', '=', Auth::user()->id)
                ->first() === null;
    }

    public function subjects(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }

}
