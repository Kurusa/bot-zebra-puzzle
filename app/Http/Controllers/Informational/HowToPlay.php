<?php

namespace App\Http\Controllers\Informational;

use App\Enums\UserStatus;
use App\Http\Controllers\BaseCommand;
use function __;

class HowToPlay extends BaseCommand
{
    public function handle(): void
    {
        $this->user->setStatus(UserStatus::HOW_TO_PLAY);

        $this->getBot()->sendText(__('texts.how_to_play'));
    }
}
