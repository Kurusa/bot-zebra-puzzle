<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Services\Handlers\UpdateProcessorService;
use App\Services\Handlers\Updates\TextOrCallbackQueryHandler;
use App\Services\Puzzle\PuzzleContext;
use App\Services\Puzzle\Table\TableCellResolver;
use App\Utils\Api;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TelegramBot\Api\Client as TelegramClient;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot(): void
    {
        $this->app->bind(UpdateProcessorService::class, function ($app) {
            return new UpdateProcessorService([
                $app->make(TextOrCallbackQueryHandler::class),
            ]);
        });

        $this->app->singleton(TelegramClient::class, function () {
            return new TelegramClient(config('telegram.telegram_bot_token'));
        });

        $this->app->singleton(Api::class, function () {
            return new Api(config('telegram.telegram_bot_token'));
        });

        $this->app->scoped(PuzzleContext::class, function () {
            return new PuzzleContext();
        });

        View::composer('*', function ($view) {
            $context = app(PuzzleContext::class);

            $view->with([
                'puzzle' => $context->puzzle,
                'progress' => $context->progress,
                'selectedSubject' => $context->selectedSubject,
                'selectedAttribute' => $context->selectedAttribute,
            ]);
        });

        User::observe(UserObserver::class);

        View::share('cellResolver', app(TableCellResolver::class));
    }
}
