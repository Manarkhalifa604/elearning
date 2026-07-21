<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'courses_description',
        'level',
        'lessons',
        'duration',
        'students',
        'image',
        'about'
    ];
}
