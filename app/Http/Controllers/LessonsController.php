<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Offering;
use App\User;
use Carbon\Carbon;
use Dingo\Api\Facade\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class LessonsController extends Controller
{
    public function index()
    {
        $offerings = Offering::with(['lesson.course'])->where('user_id', API::user()->id)->get();
        $course_ids = [];
        foreach ($offerings as $offering) {
            $course_ids[] = $offering->lesson->course->id;
        }

        return Lesson::with(['course', 'user'])
            ->whereNotIn('user_id', [API::user()->id])
            ->whereNotIn('course_id', $course_ids)
            ->get();
    }

    public function show($id)
    {
        return Lesson::find($id);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $inputs['start_date'] = Carbon::parse($inputs['start_date'])->toDateTimeString();
        $inputs['end_date'] = Carbon::parse($inputs['end_date'])->toDateTimeString();

        return Lesson::create($inputs);

    }

    public function enroll(Request $request, $id)
    {
        $lesson = Lesson::find($id);

        $lesson->students()->attach($request->get('user'));
    }

    public function getPopular()
    {

        return Offering::with(['lesson.course.course_category'])
            ->groupBy('lesson_id')->orderBy('count', 'desc')
            ->get(['lesson_id', DB::raw('count(lesson_id) as count')])
            ->take(8);
    }

    public function delete($id)
    {
        $lesson = Lesson::find($id);
        $delete = $lesson->delete();
        $user = API::user();

        $lesson->students()->detach($user->id);

        if ($delete){
            return response()->json(['success' => 'Deleted successfully']);
        }

        return response()->json(['error' => 'Deletion failed']);

    }

}
