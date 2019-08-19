<?php

namespace App\Cooking;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = 'cooking_foodcategory';
    protected $fillable = [
        'name'
    ];

    public function recipes()
    {
        return $this->hasMany('App\Cooking\Recipe');
    }
}
