<?php

namespace App\Services\Puzzle;

use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\AttributeValue;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Solution;
use App\Models\Puzzle\Subject;

class PuzzleSolutionService
{
    public static function isCorrectValue(
        Puzzle         $puzzle,
        Subject        $subject,
        Attribute      $attribute,
        AttributeValue $value
    ): bool
    {
        return Solution::where('puzzle_id', $puzzle->id)
            ->where('subject_id', $subject->id)
            ->where('attribute_id', $attribute->id)
            ->where('attribute_value_id', $value->id)
            ->exists();
    }
}
