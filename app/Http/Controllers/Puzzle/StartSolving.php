<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\TableKeyboardService;
use Illuminate\Support\Facades\View;

class StartSolving extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('puzzle_solve')->render(),
            'html',
            true,
            TableKeyboardService::make($this->puzzleContext->puzzle)
        );
    }
}
