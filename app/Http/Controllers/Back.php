<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Http\Controllers\City\Create\PromptCreateCityOptions;

class Back extends BaseCommand
{
    public function handle(): void
    {
        switch ($this->user->status) {
            case UserStatus::SELECT_DISTRICT_TO_ADD_CITY:
                $this->triggerCommand(PromptCreateCityOptions::class);
                return;
            default:
                $this->triggerCommand(MainMenu::class);
                break;
        }
    }
}
