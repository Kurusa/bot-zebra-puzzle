<?php

namespace App\Services\Keyboard\Puzzle;

use App\Enums\CallbackAction\BackAction;
use App\Enums\CallbackAction\CallbackAction;
use App\Models\Puzzle\Puzzle;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class SelectionKeyboardService
{
    public static function make(Puzzle $puzzle): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup([
            [
                [
                    'text' => __('texts.puzzle_suggestion_menu_start_solving'),
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        'a' => CallbackAction::START_SOLVING->value,
                    ]),
                ],
                [
                    'text' => __('texts.puzzle_suggestion_menu_different_puzzle'),
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        'a' => CallbackAction::DIFFERENT_PUZZLE->value,
                        'd' => $puzzle->difficulty->value,
                    ]),
                ],
            ],
            [

                [
                    'text' => __('texts.puzzle_suggestion_menu_back_to_menu'),
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        'a' => BackAction::BACK_TO_DIFFICULTY_SELECTION_MENU->value,
                    ]),
                ],
            ]
        ]);
    }
}
