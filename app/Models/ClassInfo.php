<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'class_infos';
    protected $fillable = [
        'name_class',
        'major',
        'id_teacher'
    ];

    public function classs(){
        return $this->hasMany(ClassDetail::class, 'id_class','id');
    }

    public function teachers(){
        return $this->belongsTo(User::class, 'id_teacher','id');
    }

}
