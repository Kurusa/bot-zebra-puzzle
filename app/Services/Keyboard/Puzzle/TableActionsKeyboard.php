<?php

namespace App\Services\Keyboard\Puzzle;

use App\Enums\CallbackAction\CallbackAction;
use App\Models\Puzzle\Puzzle;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class TableActionsKeyboard
{
    public static function make(Puzzle $puzzle): InlineKeyboardMarkup
    {
        $buttons = [
            [
                [
                    'text' => __('texts.back_to_puzzle'),
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        'a' => CallbackAction::START_SOLVING->value,
                    ]),
                ],
            ],
        ];

        if (self::isTableComplete($puzzle)) {
            $buttons[] = [
                [
                    'text' => __('texts.submit_solution'),
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        'a' => CallbackAction::SUBMIT_SOLUTION->value,
                    ]),
                ],
            ];
        }

        return new InlineKeyboardMarkup($buttons);
    }

    protected static function isTableComplete(Puzzle $puzzle): bool
    {
        // todo: реалізуй перевірку — чи всі комірки заповнені
        return false;
    }
}
