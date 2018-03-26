<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'course_id',
        'user_id',
        'start_date',
        'end_date',
        'location',
        'class_size'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'offerings');
    }
}
