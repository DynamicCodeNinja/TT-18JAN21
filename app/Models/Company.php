<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Database\Drivers\Mysql\Concerns\ManagesSystemConnection;

class Company extends Model implements Tenant, ManagesSystemConnection
{
    use HasFactory, AllowsTenantIdentification;

    protected $dispatchesEvents = [
        'created' => \Tenancy\Tenant\Events\Created::class,
        'updated' => \Tenancy\Tenant\Events\Updated::class,
        'deleted' => \Tenancy\Tenant\Events\Deleted::class,
    ];

    /**
     * This specifies which connection should be used when executing
     * SQL statmenets when managing a tenant DB
     **/
    public function getManagingSystemConnection(): ?string
    {
        return 'mysql-admin';
    }
}
