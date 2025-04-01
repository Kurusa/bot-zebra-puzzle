<?php

namespace App\Enums;

use App\Http\Controllers\MainMenu;
use App\Http\Controllers\Setting\Feedback;

enum PuzzleDifficulties: string
{
    const EASY = 'easy';
    const MEDIUM = 'medium';
    const HARD = 'hard';

    public static function getAvailableDifficulties(): array
    {
        return [
            self::EASY => '⭐️ Easy',
            self::MEDIUM => '⭐️⭐️ Medium',
            self::HARD => '⭐️ Easy',
        ];
    }
}
