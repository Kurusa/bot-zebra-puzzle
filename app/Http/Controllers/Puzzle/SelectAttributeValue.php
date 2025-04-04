<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\AttributeValueKeyboard;
use Illuminate\Support\Facades\View;

class SelectAttributeValue extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('select_attribute_value')->render(),
            'html',
            true,
            AttributeValueKeyboard::make(
                $this->puzzleContext->puzzle,
                $this->puzzleContext->progress,
                $this->puzzleContext->selectedSubject,
                $this->puzzleContext->selectedAttribute,
            )
        );
    }
}
