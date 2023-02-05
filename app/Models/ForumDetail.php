<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_forum_detail';
    protected $table = 'forum_details';
    protected $fillable = [
        'id_forum_detail',
        'id_forum',
        'id_user_full1',
        'description_detail',
        'done_detail',
        'date_forum_detail',
    ];

    public function userforums(){
        return $this->belongsTo(User::class, 'id_user_full1','id');
    }

    public function forums(){
        return $this->belongsTo(Forum::class, 'id_forum','id_forum');
    }
}
