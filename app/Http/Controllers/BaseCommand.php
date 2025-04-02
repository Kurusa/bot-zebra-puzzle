<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Puzzle\PuzzleContext;
use App\Utils\Api;
use App\Utils\Update;

abstract class BaseCommand
{
    protected User $user;
    protected PuzzleContext $puzzleContext;

    public function __construct(protected Update $update)
    {
        $this->user = request()->get('user');
        $this->puzzleContext = app(PuzzleContext::class);

        $this->handleCallbackQuery();
    }

    public function handleCallbackQuery(): void
    {
        if ($this->update->getCallbackQuery() && (!$this->user->show_feedback_immediately)) {
            $this->getBot()->answerCallbackQuery($this->update->getCallbackQuery()->getId());
        }
    }

    public function getBot(): Api
    {
        return app(Api::class);
    }

    public function triggerCommand($class): void
    {
        (new $class($this->update, $this->user))->handle();
    }

    abstract public function handle();
}
