<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
    'about',
    'what_you_will_learn',
    'course_content',
    'instructor_name',
    'instructor_job',
    'instructor_image',
    ]; 
    
    public function users()
{
    return $this->belongsToMany(
        User::class,
        'enrollments',
        'course_id',
        'user_id'
    );
}
};