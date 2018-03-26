<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Offering;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function getLessons($id)
    {
        $lessons = Lesson::with('course')->where('user_id', $id)->get();
        return response()->json($lessons);
    }

    public function getEnrollments($user_id)
    {
        return Offering::with('lesson.course')->where('user_id', $user_id)->get();
    }

}
