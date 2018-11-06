<?php

namespace App;

use App\Tenant\Traits\ForTenant;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use ForTenant;
}
