<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 11/5/18
 * Time: 7:35 PM
 */

namespace App\Tenant\Database;


use App\Tenant\Models\Tenant;

class DatabaseManager
{
    public function createConnection(Tenant $tenant) {
        config()->set('database.connections.tenant', $this->getTenantConnection($tenant));
    }

    protected function getTenantConnection(Tenant $tenant) {
        return array_merge(config()->get($this->getConfigConnectionPath()), $tenant->tenantConnection->only('database'));
    }

    protected function  getConfigConnectionPath(){
        return sprintf('database.connections.%s',  $this->getDefaultConnectionName());
    }

    protected function getDefaultConnectionName() {
        return config('database.default');
    }
}