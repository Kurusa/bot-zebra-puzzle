<?php

use App\Http\Controllers\Back;
use App\Http\Controllers\CheckBlockedUsers;
use App\Http\Controllers\Informational\SettingsCommand;
use App\Http\Controllers\Puzzle\SelectDifficulty;
use App\Http\Controllers\Informational\HowToPlay;
use App\Http\Controllers\Informational\ProgressMenu;
use App\Http\Controllers\MainMenu;

return [
    'telegram_bot_token' => env('TELEGRAM_BOT_TOKEN'),
    'admin_chat_id' => env('ADMIN_CHAT_ID'),

    'handlers' => [
        'keyboard' => [
            'back' => Back::class,
            'menu_option_how_to_play' => HowToPlay::class,
            'menu_option_progress' => ProgressMenu::class,

            'menu_option_start' => SelectDifficulty::class,
            'menu_option_settings' => SettingsCommand::class,
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
