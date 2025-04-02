<?php

namespace App\Services\Keyboard\Puzzle;

use App\Enums\CallbackAction\BackAction;
use App\Enums\CallbackAction\CallbackAction;
use App\Models\Puzzle\Puzzle;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class TableKeyboardService
{
    public static function make(Puzzle $puzzle): InlineKeyboardMarkup
    {
        $buttons = [];

        foreach ($puzzle->subjects as $subject) {
            $buttons[] = [
                [
                    'text' => $subject->name,
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        's' => $subject->id,
                        'a' => CallbackAction::EDIT_SUBJECT->value,
                    ]),
                ],
            ];
        }

        $buttons[] = [
            [
                'text' => __('texts.back_to_puzzle'),
                'callback_data' => json_encode([
                    'p' => $puzzle->id,
                    'a' => BackAction::BACK_TO_PUZZLE->value,
                ]),
            ],
        ];

        return new InlineKeyboardMarkup($buttons);
    }
}
