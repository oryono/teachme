<?php

use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Information Technology',
                'description' => ''
            ],

            [
                'title' => 'Science & Technology',
                'description' => ''
            ],

            [
                'title' => 'Pychology',
                'description' => ''
            ],

            [
                'title' => 'language',
                'description' => ''
            ],

            [
                'title' => 'Business',
                'description' => ''
            ],

            [
                'title' => 'Humanities',
                'description' => ''
            ],

            [
                'title' => 'Math',
                'description' => ''
            ],

            [
                'title' => 'Software Development',
                'description' => ''
            ],

            [
                'title' => 'Marketing',
                'description' => ''
            ],

            [
                'title' => 'Life Science',
                'description' => ''
            ],

            [
                'title' => 'Software Engineering',
                'description' => ''
            ],

            [
                'title' => 'Health Care',
                'description' => ''
            ],

            [
                'title' => 'Operations',
                'description' => ''
            ],

            [
                'title' => 'Skilled Trades',
                'description' => ''
            ],

            [
                'title' => 'Finance',
                'description' => ''
            ],

            [
                'title' => 'Life style',
                'description' => ''
            ],

            [
                'title' => 'Health',
                'description' => ''
            ],





        ];

        foreach ($categories as $category) {
            \App\Models\CourseCategory::create($category);
        }
    }
}
