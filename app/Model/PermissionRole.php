<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    public function Roles()
    {
        return $this->belongsToMany(Roles::class);
    }
}
