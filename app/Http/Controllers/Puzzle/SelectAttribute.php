<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use App\Services\Keyboard\Puzzle\AttributeSelectionKeyboard;
use App\Services\Keyboard\Puzzle\SubjectAttributeKeyboard;
use Illuminate\Support\Facades\View;

class SelectAttribute extends BaseCommand
{
    public function handle(): void
    {
        $puzzleId = $this->update->getCallbackQueryByKey('p');
        $selectedSubjectId = $this->update->getCallbackQueryByKey('s');

        /** @var Puzzle $puzzle */
        $puzzle = Puzzle::with(['subjects', 'attributes.values'])->findOrFail($puzzleId);
        /** @var Subject $subject */
        $subject = $puzzle->subjects->find($selectedSubjectId);

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('select_attribute', [
                'puzzle' => $puzzle,
                'progress' => $this->user->progressForPuzzle($puzzle),
                'selectedSubject' => $subject,
            ])->render(),
            'html',
            true,
            AttributeSelectionKeyboard::make($puzzle, $subject)
        );
    }
}
