<?php

namespace App\Http\Middleware\Puzzle;

use App\Enums\PuzzleDifficulty;
use App\Models\Puzzle\Puzzle;
use App\Models\User;
use App\Services\Puzzle\PuzzleContext;
use App\Services\Puzzle\PuzzleService;
use Closure;
use Illuminate\Http\Request;

class LoadPuzzleContext
{
    public function handle(Request $request, Closure $next)
    {
        $rawUpdate = json_decode($request->getContent(), true);
        $callbackData = $this->extractCallbackData($rawUpdate);

        if (!isset($callbackData['p']) && !isset($callbackData['d'])) {
            return $next($request);
        }

        if (isset($callbackData['d'])) {
            $puzzle = PuzzleService::getPuzzleForDifficulty(PuzzleDifficulty::tryFrom($callbackData['d']));
        } else {
            /** @var Puzzle $puzzle */
            $puzzle = Puzzle::with(['subjects', 'attributes.values'])->findOrFail((int)$callbackData['p']);
        }

        /** @var User $user */
        $user = $request->get('user');

        $selectedSubject = isset($callbackData['s'])
            ? $puzzle->subjects->firstWhere('id', (int)$callbackData['s'])
            : null;

        $selectedAttribute = isset($callbackData['at'])
            ? $puzzle->attributes->firstWhere('id', (int)$callbackData['at'])
            : null;

        /** @var PuzzleContext $puzzleContext */
        $puzzleContext = app(PuzzleContext::class);

        $puzzleContext->setPuzzle($puzzle);
        $puzzleContext->setProgress($user->progressForPuzzle($puzzle));
        $puzzleContext->setSelectedSubject($selectedSubject);
        $puzzleContext->setSelectedAttribute($selectedAttribute);

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
