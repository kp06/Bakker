<?php

namespace App\Traits;

use App\Model\Permission;

trait  HasPermission
{
    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            $roles = $this->roles;
            foreach ($roles as $role) {
                if ($role->permissions->contains('slug', $permission)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function givePermissionToUser($permission)
    {
        return $this->role->permissions->save(Permission::whereName($permission)->firstOrFail());
    }

    public function removePermissionsFromUser($permission)
    {
        return $this->role->permissions()->detach(Permission::whereName($permission)->firstOrFail()->id);
    }
}
