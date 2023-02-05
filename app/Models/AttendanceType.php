<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceType extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_atte_type';

    protected $table = 'attendance_types';
    protected $fillable = [
        'id_atte_type',
        'name_attendance_type',
    ];
}
