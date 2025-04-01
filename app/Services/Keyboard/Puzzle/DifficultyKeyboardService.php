<?php

namespace App\Services\Keyboard\Puzzle;

use App\Enums\CallbackAction\CallbackAction;
use App\Enums\PuzzleDifficulty;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class DifficultyKeyboardService
{
    public static function createDifficultyKeyboard(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(collect(PuzzleDifficulty::cases())
            ->map(function (PuzzleDifficulty $key) {
                return [
                    'text' => __('texts.difficulty_' . $key->value),
                    'callback_data' => json_encode([
                        'd' => $key,
                        'a' => CallbackAction::DIFFICULTY_SELECT->value,
                    ]),
                ];
            })
            ->chunk(1)
            ->map(fn($chunk) => $chunk->values()->toArray())
            ->toArray());
    }
}
