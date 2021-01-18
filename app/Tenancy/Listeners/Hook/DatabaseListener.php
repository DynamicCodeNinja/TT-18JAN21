<?php

namespace App\Tenancy\Listeners\Hook;

use Tenancy\Hooks\Database\Events\Drivers\Configuring;

class DatabaseListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function handle(Configuring $event)
    {
        $overrides = array_merge(
            $event->defaults($event->tenant),
            [
                // Allow Login from any host
                'host' => '%',
                'username' => $event->tenant->getTenantKey()
            ],
        );

        $event->useConnection('mysql-admin', $overrides);
    }
}
