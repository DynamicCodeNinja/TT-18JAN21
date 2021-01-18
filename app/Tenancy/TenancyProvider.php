<?php

namespace App\Tenancy;

use App\Models\Company;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;

class TenancyProvider extends EventServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /**
         * Hook
         */
        \Tenancy\Hooks\Database\Events\Drivers\Configuring::class => [
            \App\Tenancy\Listeners\Hook\DatabaseListener::class
        ],
        \Tenancy\Hooks\Migration\Events\ConfigureMigrations::class => [
            \App\Tenancy\Listeners\Hook\MigrationListener::class
        ],
        \Tenancy\Hooks\Migration\Events\ConfigureSeeds::class => [
            \App\Tenancy\Listeners\Hook\SeedListener::class
        ],

        /**
         * Affects
         */
        // affects-connection
        \Tenancy\Affects\Connections\Events\Resolving::class => [
            \App\Tenancy\Listeners\Affects\Connection\ResolveConnection::class
        ],
        \Tenancy\Affects\Connections\Events\Drivers\Configuring::class => [
            \App\Tenancy\Listeners\Affects\Connection\ConfigureConnection::class
        ]

    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(Company::class);

            return $resolver;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
