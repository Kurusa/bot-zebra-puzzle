<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\AttributeValue;
use App\Models\UserProgress;
use App\Services\Puzzle\PuzzleSolutionService;

class SaveAttributeValue extends BaseCommand
{
    public function handle(): void
    {
        $valueId = $this->update->getCallbackQueryByKey('v');

        UserProgress::updateOrCreate(
            [
                'user_id' => $this->user->id,
                'puzzle_id' => $this->puzzleContext->puzzle->id,
                'subject_id' => $this->puzzleContext->selectedSubject->id,
                'attribute_id' => $this->puzzleContext->selectedAttribute->id,
            ],
            [
                'attribute_value_id' => $valueId,
            ]
        );

        if ($this->user->show_feedback_immediately) {
            $isCorrect = PuzzleSolutionService::isCorrectValue(
                $this->puzzleContext->puzzle,
                $this->puzzleContext->selectedSubject,
                $this->puzzleContext->selectedAttribute,
                AttributeValue::find($valueId),
            );

            $text = $isCorrect
                ? __('texts.feedback_correct')
                : __('texts.feedback_incorrect');

            $this->getBot()->answerCallbackQuery(
                $this->update->getCallbackQuery()->getId(),
                $text,
                true
            );
        }

        $this->user->refresh();
        $this->puzzleContext->setProgress($this->user->progressForPuzzle($this->puzzleContext->puzzle));

        $this->triggerCommand(SelectAttributeValue::class);
    }
}
