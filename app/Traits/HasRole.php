<?php
namespace App\Traits;
use App\Model\Roles;

trait  HasRole{

  public function isAdmin() {
    foreach ($this->roles()->get() as $role)
    {
      if ($role->name == 'admin')
      {
        return true;
      }
    }
    return false;
  }


  public function assignRole($role)
  {
    return $this->roles()->save(Roles::whereName($role)->firstOrFail());
  }

  public function rolesName()
  {
    foreach ($this->roles()->get() as $role)
    {
     return $role->name;

    }
    return false;
  }

  public function hasRole($role)
  {
    if(is_string($role))
    {
     return $this->roles->contains('name',$role);
   }
   return !! $role->intersect($this->roles)->count();
  }

  public function removeRole($role){
    return $this->roles()->detach(Role::whereName($role)->firstOrFail()->id);
  }

  public function updateRoles(array $roles=[]){
      return $this->roles()->sync($roles);
  }

}