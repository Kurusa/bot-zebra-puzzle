<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use Illuminate\Support\Facades\View;
use App\Services\Keyboard\Puzzle\AttributeValueKeyboard;

class SelectAttributeValue extends BaseCommand
{
    public function handle(): void
    {
        $puzzleId = $this->update->getCallbackQueryByKey('p');
        $subjectId = $this->update->getCallbackQueryByKey('s');
        $attributeId = $this->update->getCallbackQueryByKey('at');

        /** @var Puzzle $puzzle */
        $puzzle = Puzzle::with(['subjects', 'attributes.values'])->findOrFail($puzzleId);
        /** @var Subject $subject */
        $subject = $puzzle->subjects->find($subjectId);
        /** @var Attribute $attribute */
        $attribute = $puzzle->attributes->find($attributeId);

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            View::make('select_attribute_value', [
                'puzzle' => $puzzle,
                'progress' => $this->user->progressForPuzzle($puzzle),
                'selectedSubject' => $subject,
                'selectedAttribute' => $attribute,
            ])->render(),
            'html',
            true,
            AttributeValueKeyboard::make($puzzle, $subject, $attribute)
        );
    }
}
