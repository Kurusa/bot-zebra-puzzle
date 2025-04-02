<?php

namespace App\Enums\CallbackAction;

use App\Http\Controllers\Puzzle\EditSubject;
use App\Http\Controllers\Puzzle\PuzzleView;
use App\Http\Controllers\Puzzle\StartSolving;
use App\Http\Controllers\Setting\Language\HandleSelectLanguage;

enum CallbackAction: int implements CallbackActionEnum
{
    case LANGUAGE_SELECT = 1;
    case DIFFICULTY_SELECT = 2;
    case START_SOLVING = 3;
    case DIFFERENT_PUZZLE = 4;
    case EDIT_SUBJECT = 7;
    case SELECT_ATTRIBUTE = 8;

    public function handler(): string
    {
        return match ($this) {
            self::LANGUAGE_SELECT => HandleSelectLanguage::class,
            self::DIFFICULTY_SELECT, self::DIFFERENT_PUZZLE => PuzzleView::class,
            self::START_SOLVING => StartSolving::class,
            self::EDIT_SUBJECT => EditSubject::class,
        };
    }
}
