<?php

use App\Http\Controllers\Back;
use App\Http\Controllers\CheckBlockedUsers;
use App\Http\Controllers\HowToPlay;
use App\Http\Controllers\MainMenu;
use App\Http\Controllers\ProgressMenu;
use Laravel\Prompts\Progress;

return [
    'telegram_bot_token' => env('TELEGRAM_BOT_TOKEN'),
    'admin_chat_id' => env('ADMIN_CHAT_ID'),

    'handlers' => [
        'keyboard' => [
            'back' => Back::class,
            'menu_option_how_to_play' => HowToPlay::class,
            'menu_option_progress' => ProgressMenu::class,
            'menu_option_start' => '',
        ],

        'slash' => [
            '/start' => MainMenu::class,
            '/blocked' => CheckBlockedUsers::class,
        ],
    ],

    'languages' => [
        'uk' => '🇺🇦Українська',
        'en' => '🇺🇸English',
    ],

    'puzzle_difficulties' => [
        'easy' => '⭐️ Easy',
        'medium' => '⭐️⭐️ Medium',
        'hard' => '⭐️⭐️⭐️ Hard',
    ],
];
