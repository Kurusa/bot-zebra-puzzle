<?php

namespace App\Services\Puzzle;

use App\Enums\PuzzleDifficulty;
use App\Models\Puzzle\Puzzle;

class PuzzleService
{
    public static function getPuzzleForDifficulty(PuzzleDifficulty $difficulty): Puzzle
    {
        return Puzzle::where('difficulty', $difficulty)->inRandomOrder()->first();
    }
}
