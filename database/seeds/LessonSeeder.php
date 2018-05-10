<?php

use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [

            [
                'course_id' => 1,
                'user_id' => 1,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 2,
                'user_id' => 1,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 3,
                'user_id' => 1,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 4,
                'user_id' => 1,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 5,
                'user_id' => 1,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 15,
                'user_id' => 3,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 11,
                'user_id' => 2,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 6,
                'user_id' => 4,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 7,
                'user_id' => 2,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],

            [
                'course_id' => 14,
                'user_id' => 1,
                'description' => '',
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s"),
                'location' => 'Kampala',
                'class_size' => 10

            ],
        ];

        foreach ($lessons as $lesson){
            \App\Models\Lesson::create($lesson);
        }
    }
}
