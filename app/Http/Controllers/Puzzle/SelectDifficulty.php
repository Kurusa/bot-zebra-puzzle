<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\DifficultyKeyboardService;
use function __;

class SelectDifficulty extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->sendMessageWithKeyboard(
            __('texts.select_difficulty'),
            DifficultyKeyboardService::make()
        );
    }
}
