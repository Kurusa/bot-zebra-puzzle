<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\SelectionKeyboardService;
use Illuminate\Support\Facades\View;

class PuzzleView extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('puzzle_info')->render(),
            'html',
            true,
            SelectionKeyboardService::make($this->puzzleContext->puzzle),
        );
    }
}
