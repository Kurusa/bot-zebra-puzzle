<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Services\Keyboard\MainMenuKeyboardService;
use Illuminate\Support\Facades\Artisan;
use function __;

class CheckBlockedUsers extends BaseCommand
{
    public function handle(): void
    {
        if (!$this->user->isAdmin()) {
             return;
        }
        
        $this->getBot()->notifyAdmin('Починаю перевірку');
        Artisan::call('check-blocked-users');
    }
}
