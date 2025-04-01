<?php

namespace App\Services\Keyboard;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class GameDifficultyKeyboardService
{
    public static function createDifficultyKeyboard(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup([
            [
                __('texts.difficulty_levels.easy'),
                __('texts.difficulty_levels.medium')
            ],
            [
                __('texts.difficulty_levels.hard')
            ]
        ], false, true);
    }
}
