<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use App\Model\category;

class Bakery extends Model
{
    protected $fillable = [
        'name', 'slug','image', 'is_active', 'description','location', 'number'
    ];
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
