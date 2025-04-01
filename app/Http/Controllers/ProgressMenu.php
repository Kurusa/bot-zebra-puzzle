<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use app\Services\Game\ProgressService;
use App\Services\Keyboard\MainMenuKeyboardService;
use function __;

class ProgressMenu extends BaseCommand
{
    public function handle(): void
    {
        $this->user->setStatus(UserStatus::SHOW_PROGRESS);

        $progress = ProgressService::getUserProgress($this->user);

        $this->getBot()->sendMessageWithKeyboard(
            sprintf(__('texts.progress'), $progress['solved'], $progress['failed']),
            MainMenuKeyboardService::createMainMenuKeyboard(),
        );
    }
}
