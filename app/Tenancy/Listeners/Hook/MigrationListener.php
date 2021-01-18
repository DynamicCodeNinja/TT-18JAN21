<?php

namespace App\Tenancy\Listeners\Hook;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;
use Tenancy\Tenant\Events\Created;

class MigrationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(ConfigureMigrations $event)
    {
        if($event->event instanceof Created) {
            $event->path(database_path('tenant/migrations'));
        }
    }
}
