<?php

namespace App\Services\Puzzle;

use App\Models\User;

class ProgressService
{
    public static function getUserProgress(User $user): array
    {
        $solved = 0;
        $failed = 0;
        $accuracy = 0;

        $progress = $user->progress;

        if ($progress) {
            $solved = $progress->solved;
            $failed = $progress->failed;
            $accuracy = (($solved + $failed) > 0) ? (round(($solved / ($solved + $failed)) * 100, 2)) : 0;
        }

        return [
            'solved' => $solved,
            'failed' => $failed,
            'accuracy' => (int)$accuracy,
        ];
    }

    public static function updateProgress(User $user, bool $isCorrect): void
    {
        $progress = $user->progress ?: $user->progress()->create();

        if ($isCorrect) {
            $progress->solved += 1;
        } else {
            $progress->failed += 1;
        }

        $progress->save();
    }
}
