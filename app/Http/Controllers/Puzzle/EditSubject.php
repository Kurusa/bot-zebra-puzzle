<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use App\Services\Keyboard\Puzzle\SubjectAttributeKeyboard;
use Illuminate\Support\Facades\View;

class EditSubject extends BaseCommand
{
    public function handle(): void
    {
        $puzzleId = (int)$this->update->getCallbackQueryByKey('p');
        $selectedSubjectId = $this->update->getCallbackQueryByKey('s');

        /** @var Puzzle $puzzle */
        $puzzle = Puzzle::with(['subjects', 'attributes.values'])->findOrFail($puzzleId);
        /** @var Subject $selectedSubject */
        $selectedSubject = $puzzle->subjects->find($selectedSubjectId);

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('edit_subject', [
                'puzzle' => $puzzle,
                'progress' => $this->user->progressForPuzzle($puzzle),
                'selectedSubject' => $selectedSubject,
            ])->render(),
            'html',
            true,
            SubjectAttributeKeyboard::make($puzzle, $selectedSubject)
        );
    }
}
