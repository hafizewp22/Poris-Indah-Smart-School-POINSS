<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'class_details';
    protected $fillable = [
        'id',
        'id_user',
        'id_class',
    ];

    public function students(){
        return $this->belongsTo(User::class, 'id_user','id');
    }

    public function classs(){
        return $this->belongsTo(ClassInfo::class, 'id_class','id');
    }
}
