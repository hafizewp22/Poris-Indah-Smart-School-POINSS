<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_atte_detail';

    protected $table = 'attendance_details';
    protected $fillable = [
        'id_atte_detail',
        'id_atte',
        'id_student',
        'id_atte_type',
        'note',
    ];

    public function attendances(){
        return $this->belongsTo(Attendance::class, 'id_atte','id_atte');
    }

    public function students(){
        return $this->belongsTo(User::class, 'id_student','id');
    }

    public function attendanceTypes(){
        return $this->belongsTo(AttendanceType::class, 'id_atte_type','id_atte_type');
    }
}
