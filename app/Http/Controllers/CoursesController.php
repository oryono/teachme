<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        return Course::all();
    }

    public function show($id)
    {
        return Course::find($id);
    }


}
