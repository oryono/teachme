<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Offering;
use App\Transformers\OfferingTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    use Helpers;

    public function getPopularCategories()
    {

        return DB::table('course_categories')
            ->select('course_categories.title as category', DB::raw('count(offerings.lesson_id) as count'), 'course_categories.id as category_id')
            ->join('courses', 'courses.category_id', '=', 'course_categories.id')
            ->join('lessons', 'courses.id', '=', 'lessons.course_id')
            ->join('offerings', 'offerings.lesson_id', '=' , 'lessons.id')
            ->groupBy('category', 'category_id')
            ->orderBy('count', 'desc')
            ->get()
            ->take(8);

    }
}
