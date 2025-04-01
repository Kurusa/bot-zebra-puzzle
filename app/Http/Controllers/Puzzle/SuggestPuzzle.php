<?php

namespace App\Http\Controllers\Puzzle;

use App\Enums\PuzzleDifficulty;
use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\SelectionKeyboardService;
use App\Services\Puzzle\PuzzleService;
use Illuminate\Support\Facades\View;
use function __;

class SuggestPuzzle extends BaseCommand
{
    public function handle(): void
    {
        $puzzle = PuzzleService::getPuzzleForDifficulty(PuzzleDifficulty::tryFrom($this->update->getCallbackQueryByKey('d')));

        $this->getBot()->sendMessageWithKeyboard(
            View::make('puzzle_info', [
                'puzzle' => $puzzle,
            ])->render(),
            SelectionKeyboardService::createDifficultyKeyboard($puzzle),
        );
    }
}
