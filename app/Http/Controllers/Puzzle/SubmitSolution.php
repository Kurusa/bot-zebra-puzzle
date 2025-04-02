<?php

namespace App\Http\Controllers\Puzzle;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\Puzzle\TableKeyboardService;

class SubmitSolution extends BaseCommand
{
    public function handle(): void
    {
        $progress = $this->puzzleContext->progress;
        $puzzle = $this->puzzleContext->puzzle;

        $totalCells = $puzzle->subjects->count() * $puzzle->attributes->count();

        if ($progress->count() < $totalCells) {
            $this->getBot()->answerCallbackQuery(
                $this->update->getCallbackQuery()->getId(),
                __('texts.solution_not_completed'),
                true
            );
            return;
        }

        $correct = $puzzle->solutions->every(function ($solution) use ($progress) {
            $key = $solution->subject_id . '_' . $solution->attribute_id;
            return $progress->has($key)
                && $progress[$key]->attribute_value_id === $solution->attribute_value_id;
        });

        $message = $correct
            ? __('texts.solution_correct')
            : __('texts.solution_incorrect');

        $this->getBot()->editMessageText(
            $this->user->chat_id,
            $this->update->getCallbackQuery()->getMessage()->getMessageId(),
            $message,
            'html',
            true,
            TableKeyboardService::make($puzzle)
        );
    }
}
