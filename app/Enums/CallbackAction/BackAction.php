<?php

namespace App\Enums\CallbackAction;

enum BackAction: int implements CallbackActionEnum
{
    public function handler(): string
    {
        return '';
    }
}
