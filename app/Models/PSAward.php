<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PSAward extends Model
{
    use HasFactory;

    protected $table = 'p_s_awards';
    protected $fillable = [
        'id_ps',
        'award',
        'date',
        'point',
        'input',
    ];

    public function points(){
        return $this->belongsTo(PointStudent::class, 'id_ps','id');
    }

    public function teachers(){
        return $this->belongsTo(User::class, 'input','id');
    }

    public static function awards(){
        return DB::table('p_s_awards')
            ->join('point_students', 'p_s_awards.id_ps', '=', 'point_students.id')
            ->join('users', 'point_students.id_student', '=', 'users.id')
            ->where('point_students.id_student', '=', Auth::user()->id)
            ->get();
    }
}
