<?php

namespace App;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    ///fake just
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }


    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
