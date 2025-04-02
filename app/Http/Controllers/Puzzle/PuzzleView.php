<?php

namespace App\Http\Controllers\Puzzle;

use App\Enums\PuzzleDifficulty;
use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Puzzle;
use App\Services\Keyboard\Puzzle\SelectionKeyboardService;
use App\Services\Puzzle\PuzzleService;
use Illuminate\Support\Facades\View;

class PuzzleView extends BaseCommand
{
    public function handle(): void
    {
        $difficulty = $this->update->getCallbackQueryByKey('d');
        $puzzleId = $this->update->getCallbackQueryByKey('p');

        if ($difficulty) {
            $puzzle = PuzzleService::getPuzzleForDifficulty(PuzzleDifficulty::tryFrom($difficulty));
        } else {
            $puzzle = Puzzle::find($puzzleId);
        }

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('puzzle_info', [
                'puzzle' => $puzzle,
                'progress' => $this->user->progressForPuzzle($puzzle),
            ])->render(),
            'html',
            true,
            SelectionKeyboardService::make($puzzle),
        );
    }
}
