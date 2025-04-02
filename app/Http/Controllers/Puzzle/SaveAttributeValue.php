<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\AttributeValue;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use App\Models\UserProgress;
use App\Services\Keyboard\Puzzle\AttributeSelectionKeyboard;
use Illuminate\Support\Facades\View;

class SaveAttributeValue extends BaseCommand
{
    public function handle(): void
    {
        $valueId = $this->update->getCallbackQueryByKey('v');

        /** @var Puzzle $puzzle */
        $puzzle = request()->get('puzzle');
        /** @var Subject $subject */
        $subject = request()->get('selectedSubject');
        /** @var Attribute $subject */
        $attribute = request()->get('selectedAttribute');

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
            View::make('edit_subject')->render(),
            'html',
            true,
            AttributeSelectionKeyboard::make(),
        );
    }
}
