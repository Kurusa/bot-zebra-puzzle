<?php

namespace App\Services\Keyboard\Puzzle;

use App\Enums\CallbackAction\CallbackAction;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class SubjectAttributeKeyboard
{
    public static function make(Puzzle $puzzle, Subject $subject): InlineKeyboardMarkup
    {
        $buttons = [];

        foreach ($puzzle->attributes as $attribute) {
            $buttons[] = [
                [
                    'text' => $attribute->name,
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        's' => $subject->id,
                        'at' => $attribute->id,
                        'a' => CallbackAction::SELECT_ATTRIBUTE->value,
                    ]),
                ],
            ];
        }

        $buttons[] = [
            [
                'text' => __('texts.back_to_table'),
                'callback_data' => json_encode([
                    'p' => $puzzle->id,
                    'a' => CallbackAction::START_SOLVING->value,
                ]),
            ],
        ];

        return new InlineKeyboardMarkup($buttons);
    }
}
