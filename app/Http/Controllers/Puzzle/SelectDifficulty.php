<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\DifficultyKeyboardService;
use Illuminate\Support\Facades\View;
use function __;

class SelectDifficulty extends BaseCommand
{
    public function handle(): void
    {
        if ($this->update->getCallbackQuery()) {
            $this->getBot()->editMessageText(
                $this->user->chat_id,
                $this->update->getCallbackQuery()->getMessage()->getMessageId(),
                __('texts.select_difficulty'),
                'html',
                true,
                DifficultyKeyboardService::make()
            );
        } else {
            $this->getBot()->sendMessageWithKeyboard(
                __('texts.select_difficulty'),
                DifficultyKeyboardService::make()
            );
        }
    }
}
