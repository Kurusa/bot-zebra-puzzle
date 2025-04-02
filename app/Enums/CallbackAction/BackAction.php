<?php

namespace App\Enums\CallbackAction;

use App\Http\Controllers\Puzzle\PuzzleView;
use App\Http\Controllers\Puzzle\SelectDifficulty;

enum BackAction: int implements CallbackActionEnum
{
    case BACK_TO_DIFFICULTY_SELECTION_MENU = 5;
    case BACK_TO_PUZZLE = 6;

    public function handler(): string
    {
        return match ($this) {
            self::BACK_TO_DIFFICULTY_SELECTION_MENU => SelectDifficulty::class,
            self::BACK_TO_PUZZLE => PuzzleView::class,
        };
    }
}
