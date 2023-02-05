<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancelation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'cancelations';
    protected $fillable = [
        'id',
        'id_schedule',
        'id_teacher',
        'reason_cancelation',
    ];

    public function schedules(){
        return $this->belongsTo(Schedule::class, 'id_schedule','id_sch');
    }
}
