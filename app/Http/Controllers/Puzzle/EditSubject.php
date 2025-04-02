<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\SubjectAttributeKeyboard;
use Illuminate\Support\Facades\View;

class EditSubject extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('edit_subject')->render(),
            'html',
            true,
            SubjectAttributeKeyboard::make()
        );
    }
}
