<?php

namespace App\Http\Controllers\Game;

use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use function __;

class StartPuzzle extends BaseCommand
{
    public function handle(): void
    {
        $this->user->setStatus(UserStatus::VIEW_PUZZLE);

        $puzzle = $this->puzzleService->getPuzzleForDifficulty($this->user->difficulty);

        $this->getBot()->sendMessageWithKeyboard(
            __('texts.puzzle_intro', [
                'number' => $puzzle->id,
                'description' => $puzzle->description
            ]),
            MainMenuKeyboardService::createMainMenuKeyboard()
        );
    }
}
