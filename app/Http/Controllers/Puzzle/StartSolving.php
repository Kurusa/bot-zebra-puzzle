<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Puzzle;
use App\Services\Keyboard\Puzzle\TableKeyboardService;
use Illuminate\Support\Facades\View;

class StartSolving extends BaseCommand
{
    public function handle(): void
    {
        $puzzleId = $this->update->getCallbackQueryByKey('p');
        $puzzle = Puzzle::find($puzzleId);

        $this->getBot()->sendMessageWithKeyboard(
            View::make('puzzle_solve', [
                'puzzle' => $puzzle,
            ])->render(),
            TableKeyboardService::make($puzzle)
        );
    }
}
