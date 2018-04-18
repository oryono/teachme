<?php

namespace App;

use App\Models\Lesson;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'user_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Offering::class, 'user_id');
    }

}
