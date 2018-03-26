<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'category_id'
    ];

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }
}
