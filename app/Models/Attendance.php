<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_atte';

    protected $table = 'attendances';
    protected $fillable = [
        'id_atte',
        'id_subject',
        'date',
        'time',
        'done',
    ];

    public function subjects(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }

    public function attendances(){
        return $this->belongsTo(AttendanceDetail::class, 'id_atte','id_atte');
    }


    public function attendancesInSick(){
//        return $this->hasMany(AttendanceDetail::class, 'id_atte', 'id_atte')
//            ->where('attendance_details.id_atte_type', '=', 1)
//            ->where('attendance_details.id_student', '=', Auth::user()->id)
//            ->count();

        return DB::table('subjects')
            ->join('attendances', 'subjects.id_sub', '=', 'attendances.id_subject')
            ->join('attendance_details', 'attendances.id_atte', '=', 'attendance_details.id_atte')
            ->orWhere('attendance_details.id_atte_type', '=', '1')
            ->where('attendance_details.id_student', '=', Auth::user()->id)
            ->count();

    }

    public function attendancesInPresent(){
//        return $this->hasMany(AttendanceDetail::class, 'id_atte', 'id_atte')
//            ->where('attendance_details.id_atte_type', '=', 2)
//            ->where('attendance_details.id_student', '=', Auth::user()->id)
//            ->count();

        return DB::table('subjects')
            ->join('attendances', 'subjects.id_sub', '=', 'attendances.id_subject')
            ->join('attendance_details', 'attendances.id_atte', '=', 'attendance_details.id_atte')
            ->orWhere('attendance_details.id_atte_type', '=', '2')
            ->where('attendance_details.id_student', '=', Auth::user()->id)
            ->count();

    }

    public function attendancesInAbsent(){
//        return $this->hasMany(AttendanceDetail::class, 'id_atte', 'id_atte')
//            ->where('attendance_details.id_atte_type', '=', 3)
//            ->where('attendance_details.id_student', '=', Auth::user()->id)
//            ->count();

        return DB::table('subjects')
            ->join('attendances', 'subjects.id_sub', '=', 'attendances.id_subject')
            ->join('attendance_details', 'attendances.id_atte', '=', 'attendance_details.id_atte')
            ->orWhere('attendance_details.id_atte_type', '=', '3')
            ->where('attendance_details.id_student', '=', Auth::user()->id)
            ->count();
    }

    public function attendancesInPermit(){
//        return $this->hasMany(AttendanceDetail::class, 'id_atte', 'id_atte')
//            ->where('attendance_details.id_atte_type', '=', 4)
//            ->where('attendance_details.id_student', '=', Auth::user()->id)
//            ->count();

        return DB::table('subjects')
            ->join('attendances', 'subjects.id_sub', '=', 'attendances.id_subject')
            ->join('attendance_details', 'attendances.id_atte', '=', 'attendance_details.id_atte')
            ->orWhere('attendance_details.id_atte_type', '=', '4')
            ->where('attendance_details.id_student', '=', Auth::user()->id)
            ->count();
    }
}
