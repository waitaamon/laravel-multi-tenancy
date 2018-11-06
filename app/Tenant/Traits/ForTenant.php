<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 11/6/18
 * Time: 8:57 AM
 */

namespace App\Tenant\Traits;


trait ForTenant
{
    public function getConnectionName()
    {
        return 'tenant';
    }

}