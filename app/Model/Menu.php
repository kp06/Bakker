<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\MenuItem;

class Menu extends Model
{
protected $fillable = ['title','slug','is_active','description'];
public function menuItem()
{
    return $this->hasMany(MenuItem::class,'parent_id');
}
}
