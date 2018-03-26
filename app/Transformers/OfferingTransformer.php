<?php

namespace App\Transformers;
use App\Offering;
use League\Fractal\TransformerAbstract;

class OfferingTransformer extends TransformerAbstract {

    public function transform(Offering $offering)
    {
        return [
            'category' => $offering->lesson->course->course_category->title,
            'count' => $offering->lesson->course


        ];

    }

    public function formatCategories()
    {

    }

}