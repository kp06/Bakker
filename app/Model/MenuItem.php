<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Menu;

class MenuItem extends Model
{
   protected $fillable= ['name','slug','is_active','parent_id'];
   public function menu()
   {
       return $this->belongsTo(Menu::class,'parent_id');
   }
}
