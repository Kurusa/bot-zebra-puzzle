<?php

namespace App\Enums;

enum PuzzleDifficulty: string
{
    case EASY = 'easy';
    case MEDIUM = 'medium';
    case HARD = 'hard';

    public static function getAvailableDifficulties(): array
    {
        return [
            self::EASY,
            self::MEDIUM,
            self::HARD,
        ];
    }
}
