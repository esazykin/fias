<?php

declare(strict_types=1);

namespace Vyuldashev\Fias;

use Illuminate\Support\ServiceProvider;
use Vyuldashev\Fias\Console\FiasDownloadCommand;
use Vyuldashev\Fias\Console\FiasDownloadDeltaCommand;

class FiasServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }

    public function register(): void
    {
        $this->commands([
            FiasDownloadCommand::class,
            FiasDownloadDeltaCommand::class,
        ]);
    }
}
