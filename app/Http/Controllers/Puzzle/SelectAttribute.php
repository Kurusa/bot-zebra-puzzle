<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\AttributeSelectionKeyboard;
use Illuminate\Support\Facades\View;

class SelectAttribute extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('select_attribute')->render(),
            'html',
            true,
            AttributeSelectionKeyboard::make()
        );
    }
}
