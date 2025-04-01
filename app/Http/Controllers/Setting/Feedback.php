<?php

namespace App\Http\Controllers\Setting;

use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use App\Http\Controllers\MainMenu;
use App\Traits\HasKeyboard;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;

class Feedback extends BaseCommand
{
    use HasKeyboard;

    public function handle(): void
    {
        if ($this->user->matchStatus(UserStatus::PROVIDE_FEEDBACK)) {
            $this->user->feedbacks()->create(['message' => $this->update->getMessageText()]);

            $this->getBot()->sendText(__('texts.message_sent'));

            if ($this->user->isGroupChat()) {
                $this->user->update([
                    'status' => UserStatus::MAIN_MENU
                ]);
            } else {
                $this->triggerCommand(MainMenu::class);
            }
        } else {
            $this->user->setStatus(UserStatus::PROVIDE_FEEDBACK);

            if ($this->user->isGroupChat()) {
                $this->getBot()->sendText(__('texts.pre_send_feedback'));
            } else {
                $buttons = [];

                $this->getBot()->sendMessageWithKeyboard(
                    __('texts.pre_send_feedback'),
                    new ReplyKeyboardMarkup(self::addBackButton($buttons), false, true)
                );
            }
        }
    }
}
