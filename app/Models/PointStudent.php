<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointStudent extends Model
{
    use HasFactory;
    protected $table = 'point_students';
    protected $fillable = [
        'id_student',
        'name_ps',
    ];

    public function students(){
        return $this->belongsTo(User::class, 'id_student','id');
    }
}
