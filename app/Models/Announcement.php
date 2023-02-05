<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'announcements';
    protected $fillable = [
        'title',
        'detail_information',
        'id_user',
        'post_date',
        'valid_date',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'id_user','id');
    }
}
