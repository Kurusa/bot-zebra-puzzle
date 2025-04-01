<?php

namespace App\Http\Controllers;

use function __;

class HowToPlay extends BaseCommand
{
    public function handle(): void
    {
        $this->getBot()->sendText(__('texts.how_to_play'));
    }
}
