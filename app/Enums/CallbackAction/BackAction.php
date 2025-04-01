<?php

namespace App\Enums\CallbackAction;

use App\Http\Controllers\Puzzle\SuggestPuzzle;
use App\Http\Controllers\Setting\Language\HandleSelectLanguage;

enum BackAction: int implements CallbackActionEnum
{
    case BACK_TO_DIFFICULTY_SELECTION_MENU = 5;

    public function handler(): string
    {
        return match ($this) {
            self::BACK_TO_DIFFICULTY_SELECTION_MENU => '',
        };
    }
}
