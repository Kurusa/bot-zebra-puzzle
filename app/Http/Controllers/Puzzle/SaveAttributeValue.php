<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\AttributeValue;
use App\Models\UserProgress;
use App\Services\Keyboard\Puzzle\AttributeSelectionKeyboard;
use Illuminate\Support\Facades\View;
use App\Services\Keyboard\Puzzle\TableActionsKeyboard;

class SaveAttributeValue extends BaseCommand
{
    public function handle(): void
    {
        $puzzleId = $this->update->getCallbackQueryByKey('p');
        $subjectId = $this->update->getCallbackQueryByKey('s');
        $attributeId = $this->update->getCallbackQueryByKey('at');
        $valueId = $this->update->getCallbackQueryByKey('v');

        /** @var Puzzle $puzzle */
        $puzzle = Puzzle::with(['subjects', 'attributes.values'])->findOrFail($puzzleId);
        /** @var Subject $subject */
        $subject = $puzzle->subjects->find($subjectId);
        /** @var Attribute $attribute */
        $attribute = $puzzle->attributes->find($attributeId);
        /** @var AttributeValue $value */
        $value = $attribute->values->find($valueId);

        UserProgress::updateOrCreate(
            [
                'user_id' => $this->user->id,
                'puzzle_id' => $puzzle->id,
                'subject_id' => $subject->id,
                'attribute_id' => $attribute->id,
            ],
            [
                'attribute_value_id' => $value->id,
            ]
        );

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('edit_subject', [
                'puzzle' => $puzzle,
                'progress' => $this->user->progressForPuzzle($puzzle),
                'selectedSubject' => $subject,
                'selectedAttribute' => $attribute,
            ])->render(),
            'html',
            true,
            AttributeSelectionKeyboard::make($puzzle, $subject),
        );
    }
}
