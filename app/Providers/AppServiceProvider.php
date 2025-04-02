<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Services\Handlers\UpdateProcessorService;
use App\Services\Handlers\Updates\TextOrCallbackQueryHandler;
use App\Services\Puzzle\Table\TableCellResolver;
use App\Utils\Api;
use Carbon\Carbon;
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

        View::composer('*', function ($view) {
            $request = request();

            if ($request->has('puzzle')) {
                $view->with('puzzle', $request->get('puzzle'));
            }

            if ($request->has('progress')) {
                $view->with('progress', $request->get('progress'));
            }

            if ($request->has('selectedSubject')) {
                $view->with('selectedSubject', $request->get('selectedSubject'));
            }

            if ($request->has('selectedAttribute')) {
                $view->with('selectedAttribute', $request->get('selectedAttribute'));
            }
        });

        Carbon::setLocale(app()->getLocale());
        User::observe(UserObserver::class);

        View::share('cellResolver', app(TableCellResolver::class));
    }
}
