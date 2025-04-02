<?php

namespace App\Http\Middleware;

use App\Models\Puzzle\Puzzle;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class LoadPuzzleProgress
{
    public function handle(Request $request, Closure $next)
    {
        $rawUpdate = json_decode($request->getContent(), true);
        $callbackData = $this->extractCallbackData($rawUpdate);

        if (!isset($callbackData['p'])) {
            return $next($request);
        }

        $puzzleId = (int)$callbackData['p'];

        /** @var Puzzle $puzzle */
        $puzzle = Puzzle::with(['subjects', 'attributes.values'])->findOrFail($puzzleId);

        /** @var User $user */
        $user = $request->get('user');

        $progress = $user->progress()
            ->where('puzzle_id', $puzzle->id)
            ->get()
            ->keyBy(fn($p) => $p->subject_id . '_' . $p->attribute_id);

        $request->merge([
            'puzzle' => $puzzle,
            'progress' => $progress,
        ]);

        return $next($request);
    }

    private function extractCallbackData(array $rawUpdate): ?array
    {
        if (isset($rawUpdate['callback_query']['data'])) {
            return json_decode($rawUpdate['callback_query']['data'], true);
        }

        return null;
    }
}
