<?php

namespace App\Services\Keyboard\Puzzle;

use App\Enums\CallbackAction\CallbackAction;
use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use App\Services\Puzzle\PuzzleSolutionService;
use Illuminate\Database\Eloquent\Collection;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class AttributeValueKeyboard
{
    public static function make(
        Puzzle     $puzzle,
        Collection $progress,
        Subject    $subject,
        Attribute  $attribute,
    ): InlineKeyboardMarkup
    {
        $buttons = [];

        foreach ($attribute->values as $value) {
            $selected = $progress->has($subject->id . '_' . $attribute->id)
                && $progress[$subject->id . '_' . $attribute->id]->attribute_value_id === $value->id;

            $isCorrect = PuzzleSolutionService::isCorrectValue($puzzle, $subject, $attribute, $value);

            $buttons[] = [
                [
                    'text' => ($selected ? ($isCorrect ? '✅ ' : '❌ ') : '') . $value->value,
                    'callback_data' => json_encode([
                        'p' => $puzzle->id,
                        's' => $subject->id,
                        'at' => $attribute->id,
                        'v' => $value->id,
                        'a' => CallbackAction::SAVE_ATTRIBUTE_VALUE->value,
                    ]),
                ],
            ];
        }

        $buttons[] = [
            [
                'text' => __('texts.back_to_subject'),
                'callback_data' => json_encode([
                    'p' => $puzzle->id,
                    's' => $subject->id,
                    'a' => CallbackAction::EDIT_SUBJECT->value,
                ]),
            ],
        ];

        return new InlineKeyboardMarkup($buttons);
    }
}
