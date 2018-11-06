<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 11/5/18
 * Time: 6:34 PM
 */

namespace App\Tenant;


use App\Tenant\Models\Tenant;

class Manager
{
    protected $tenant;

    public function setTenant(Tenant $tenant) {
        $this->tenant = $tenant;
    }

    public function getTenant() {
        return $this->tenant;
    }

    public function hasTenant() {
        return isset($this->tenant);
    }
}