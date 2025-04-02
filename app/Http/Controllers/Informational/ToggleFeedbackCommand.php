<?php

namespace App\Http\Controllers\Informational;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\SettingsKeyboard;

class ToggleFeedbackCommand extends BaseCommand
{
    public function handle(): void
    {
        $this->user->update([
            'show_feedback_immediately' => !$this->user->show_feedback_immediately,
        ]);

        $status = $this->user->show_feedback_immediately
            ? __('texts.settings_feedback_enabled')
            : __('texts.settings_feedback_disabled');

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            __('texts.settings_feedback_toggled', ['status' => $status]),
            'html',
            true,
            SettingsKeyboard::make()
        );
    }
}
