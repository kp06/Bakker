<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  public function users(){
      return $this->belongsToMany(User::class);
  }
  public function permissions()
  {
      return $this->belongsToMany(Permission::class,'permission_roles', 'role_id','permission_id');
  }
}
