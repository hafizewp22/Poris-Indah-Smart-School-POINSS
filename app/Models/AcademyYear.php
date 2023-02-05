<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademyYear extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'academy_years';
    protected $fillable = [
        'name_academic_year',
    ];

}
