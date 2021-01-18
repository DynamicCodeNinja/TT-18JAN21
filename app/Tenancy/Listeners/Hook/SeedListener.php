<?php
namespace App\Tenancy\Listeners\Hook;

use Database\Seeders\PostSeeder;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;
use Tenancy\Tenant\Events\Created;

class SeedListener
{
    public function handle(ConfigureSeeds $event)
    {
        if($event->event instanceof Created) {
            $event->seed(PostSeeder::class);
        }

    }
}
