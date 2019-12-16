<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Product extends Model
{
protected $fillable =
['name','slug','size','is_active','image','description','price','quantity','category_id'];
public function category(){
    return $this->belongsTo(Category::class);
}
}
