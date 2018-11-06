<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 11/5/18
 * Time: 7:20 PM
 */

namespace App\Tenant\Database;


use App\Tenant\Models\Tenant;
use Illuminate\Support\Facades\DB;

class DatabaseCreator
{
    public function create(Tenant $tenant) {
        return DB::statement("
            CREATE DATABASE multiTenancyTuts_{$tenant->id}
        ");
    }
}