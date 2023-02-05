<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AssignmentDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_id';

    protected $table = 'assignment_details';
    protected $fillable = [
        'id_id',
        'id_student',
        'id_assignment',
        'score',
        'file_assignment',
    ];

    public function assignments(){
        return $this->belongsTo(Assignment::class, 'id_assignment','id_id');
    }

    public function students(){
        return $this->belongsTo(User::class, 'id_student','id');
    }
}
