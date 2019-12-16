<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Bakery;
use App\Model\Product;

class Category extends Model
{
  protected $fillable =
  [
    'name', 'slug','image', 'is_active', 'description',   ];
    public function Bakery()
    {
        return $this->belongsToMany(Bakery::class);
    }
    public function product(){
      return $this->hasMany(Product::class);
    }
}
