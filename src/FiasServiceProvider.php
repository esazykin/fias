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
        $migrations = collect([
            __DIR__.'/../database/migrations/create_actual_statuses_table.php',
            __DIR__.'/../database/migrations/create_address_object_types_table.php',
            __DIR__.'/../database/migrations/create_center_statuses_table.php',
            __DIR__.'/../database/migrations/create_current_statuses_table.php',
            __DIR__.'/../database/migrations/create_estate_statuses_table.php',
            __DIR__.'/../database/migrations/create_flat_types_table.php',
            __DIR__.'/../database/migrations/create_house_state_statuses_table.php',
            __DIR__.'/../database/migrations/create_houses_table.php',
            __DIR__.'/../database/migrations/create_interval_statuses_table.php',
            __DIR__.'/../database/migrations/create_normative_document_types_table.php',
            __DIR__.'/../database/migrations/create_normative_documents_table.php',
            __DIR__.'/../database/migrations/create_objects_table.php',
            __DIR__.'/../database/migrations/create_operation_statuses_table.php',
            __DIR__.'/../database/migrations/create_room_types_table.php',
            __DIR__.'/../database/migrations/create_rooms_table.php',
            __DIR__.'/../database/migrations/create_steads_table.php',
            __DIR__.'/../database/migrations/create_structure_statuses_table.php',
        ]);

        $migrations->transform(function ($item) {
            $name = collect(explode('/', $item))->last();

            return [
                'source' => $item,
                'target' => database_path('migrations/'.date('Y_m_d_His').'_'.$name),
            ];
        });

        $this->publishes($migrations->pluck('target', 'source')->toArray(), 'migrations');
    }

    public function register(): void
    {
        $this->commands([
            FiasDownloadCommand::class,
            FiasDownloadDeltaCommand::class,
        ]);
    }
}
