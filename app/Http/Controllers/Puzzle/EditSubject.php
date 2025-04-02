<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Puzzle;
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
        $selectedSubject = $puzzle->subjects->find($selectedSubjectId);

        $this->getBot()->sendMessageWithKeyboard(
            View::make('edit_subject', [
                'puzzle' => $puzzle,
                'selectedSubject' => $selectedSubject,
            ])->render(),
            SubjectAttributeKeyboard::make($puzzle, $selectedSubject)
        );
    }
}
