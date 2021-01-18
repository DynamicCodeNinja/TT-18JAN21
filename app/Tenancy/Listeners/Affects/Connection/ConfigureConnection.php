<?php

namespace App\Tenancy\Listeners\Affects\Connection;

use Tenancy\Affects\Connections\Events\Drivers\Configuring;

class ConfigureConnection
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

    public function handle(Configuring $event)
    {
        $event->useConnection('mysql', $event->defaults($event->tenant));
    }
}
