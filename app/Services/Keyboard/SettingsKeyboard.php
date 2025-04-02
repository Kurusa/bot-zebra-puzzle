<?php

namespace App\Services\Keyboard;

use App\Enums\CallbackAction\CallbackAction;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class SettingsKeyboard
{
    public static function make(): InlineKeyboardMarkup
    {
        $user = request()->get('user');

        $feedbackStatus = $user->show_feedback_immediately
            ? __('texts.settings_feedback_enabled')
            : __('texts.settings_feedback_disabled');

        return new InlineKeyboardMarkup([
            [
                [
                    'text' => __('texts.settings_feedback_label') . ' ' . $feedbackStatus,
                    'callback_data' => json_encode([
                        'a' => CallbackAction::TOGGLE_FEEDBACK->value,
                    ]),
                ],
            ],
        ]);
    }
}
