<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_forum';
    protected $table = 'forums';
    protected $fillable = [
        'id_forum',
        'id_subject',
        'id_user_full',
        'title_forum',
        'description',
        'done',
        'date_forum',
    ];

    public function userforums(){
        return $this->belongsTo(User::class, 'id_user_full','id');
    }

    public function subjectforums(){
        return $this->belongsTo(Subjects::class, 'id_subject','id_sub');
    }
}
