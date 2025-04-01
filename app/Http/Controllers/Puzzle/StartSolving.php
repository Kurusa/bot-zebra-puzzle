<?php

namespace App\Http\Controllers\Puzzle;

use App\Enums\PuzzleDifficulty;
use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle;
use App\Services\Puzzle\PuzzleService;
use App\Services\Keyboard\Puzzle\SelectionKeyboardService;
use Illuminate\Support\Facades\View;
use function __;

class StartSolving extends BaseCommand
{
    public function handle(): void
    {
        $puzzleId = $this->update->getCallbackQueryByKey('p');
        $puzzle = Puzzle::find($puzzleId);

        $this->getBot()->sendMessageWithKeyboard(
            View::make('puzzle_start', [
                'puzzle' => $puzzle,
            ])->render(),
            SelectionKeyboardService::createSolvingKeyboard($puzzle)
        );
    }
}
