<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
     protected $fillable = [
        'first_name', 'last_name','gender', 'image', 'address', 'phone', 'user_id'
    ];
      public function users(){
        return $this->belongsTo(user::class,'id');
    }
}
