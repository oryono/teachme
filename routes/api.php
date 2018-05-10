<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\v1\UserController;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('auth/register', RegisterController::class.'@store');

    $api->post('auth/token', AuthenticationController::class.'@authenticate');

    $api->get('refresh-token', AuthenticationController::class.'@refreshToken');

    $api->group(['prefix' => 'courses'], function ($api){
        $api->get('/', CoursesController::class. '@index');

        $api->get('{id}', CoursesController::class.'@show');

        $api->get('popular', CoursesController::class.'@getPopular');

        $api->get('top', CoursesController::class.'@getTop');

        $api->post('/create', CoursesController::class.'@store');
    });


    $api->get('/lessons/popular', LessonsController::class.'@getPopular');


    $api->group(['prefix' => 'categories'], function ($api){
        $api->get('/', UserController::class. '@index');

        $api->get('popular', CategoriesController::class.'@getPopularcategories');


    });

});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->group(['prefix' => 'users'], function ($api){
        $api->get('/', function () {
            return User::with('lessons')->get();
        });

        $api->get('{id}', UserController::class.'@index');

        $api->get('{id}/lessons', UserController::class.'@getLessons');

        $api->get('{id}/enrollments', UserController::class.'@getEnrollments');
    });

    $api->group(['prefix' => 'lessons'], function ($api){
        $api->get('/', LessonsController::class. '@index');

        $api->post('/', LessonsController::class.'@store');


        $api->delete('/{id}/', LessonsController::class.'@delete');

        $api->get('{id}', LessonsController::class.'@show');

        $api->post('{id}/enroll', LessonsController::class.'@enroll');
    });

});


