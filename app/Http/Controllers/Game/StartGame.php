<?php

namespace App\Http\Controllers\Game;

use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\GameDifficultyKeyboardService;
use function __;

class StartGame extends BaseCommand
{
    public function handle(): void
    {
        $this->user->setStatus(UserStatus::SELECT_DIFFICULTY);

        $this->getBot()->sendMessageWithKeyboard(
            __('texts.select_difficulty'),
            GameDifficultyKeyboardService::createDifficultyKeyboard()
        );
    }
}
