<?php

namespace App\Services\Keyboard;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class MainMenuKeyboardService
{
    public static function createMainMenuKeyboard(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup([
            [
                __('texts.menu_option_start'),
                __('texts.menu_option_progress')
            ],
            [
                __('texts.menu_option_how_to_play')
            ]
        ], false, true);
    }
}
