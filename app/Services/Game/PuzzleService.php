<?php

namespace App\Services;

use App\Models\Puzzle;

class PuzzleService
{
    public static function getPuzzleForDifficulty(string $difficulty)
    {
        // Завантажуємо випадкову задачу за складністю
        return Puzzle::where('difficulty', $difficulty)->inRandomOrder()->first();
    }
}
