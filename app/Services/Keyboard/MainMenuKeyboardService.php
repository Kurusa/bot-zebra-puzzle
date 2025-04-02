<?php

namespace App\Services\Keyboard;

use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class MainMenuKeyboardService
{
    public static function make(): ReplyKeyboardMarkup
    {
        return new ReplyKeyboardMarkup([
            [
                __('texts.menu_option_start'),
                __('texts.menu_option_progress')
            ],
            [
                __('texts.menu_option_how_to_play')
            ],
            [
                __('texts.menu_option_settings'),
            ]
        ], false, true);
    }
}
