<?php

namespace App\Http\Controllers;

use App\Enums\PuzzleDifficulty;
use App\Enums\UserStatus;
use App\Models\Puzzle;
use App\Services\Keyboard\MainMenuKeyboardService;
use App\Services\Puzzle\PuzzleService;
use function __;

class MainMenu extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->sendText($text);
        $this->user->setStatus(UserStatus::MAIN_MENU);

        $this->getBot()->sendMessageWithKeyboard(
            __('texts.menu'),
            MainMenuKeyboardService::createMainMenuKeyboard(),
        );
    }
}
