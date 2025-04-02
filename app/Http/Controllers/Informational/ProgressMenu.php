<?php

namespace App\Http\Controllers\Informational;

use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\MainMenuKeyboardService;
use App\Services\Puzzle\ProgressService;
use function __;

class ProgressMenu extends BaseCommand
{
    public function handle(): void
    {
        $this->user->setStatus(UserStatus::SHOW_PROGRESS);

        $progress = ProgressService::getUserProgress($this->user);

        $this->getBot()->sendMessageWithKeyboard(
            sprintf(
                __('texts.progress'),
                $progress['solved'],
                $progress['failed'],
            ),
            MainMenuKeyboardService::createMainMenuKeyboard(),
        );
    }
}
