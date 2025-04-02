<?php

namespace App\Http\Controllers\Informational;

use App\Http\Controllers\BaseCommand;
use App\Services\Keyboard\SettingsKeyboard;

class SettingsCommand extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->sendMessageWithKeyboard(
            __('texts.menu_option_settings'),
            SettingsKeyboard::make()
        );
    }
}
