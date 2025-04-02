<?php

use App\Http\Controllers\WebhookController;
use App\Http\Middleware\LoadPuzzleProgress;
use App\Http\Middleware\LoadTelegramUser;
use App\Http\Middleware\SaveMessage;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
});

Route::post('/' . config('telegram.telegram_bot_token') . '/webhook', [WebhookController::class, 'handle'])
    ->middleware([
        LoadTelegramUser::class,
        SaveMessage::class,
        LoadPuzzleProgress::class,
    ]);
