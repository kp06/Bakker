<?php

namespace App;
use App\Model\UserDetail;
use App\Traits\HasRole;
use App\Traits\HasPermission;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Model\Roles;

class User extends Authenticatable
{
    use Notifiable, HasRole, HasPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Roles::class,'user_roles', 'user_id','role_id');
    }
}
