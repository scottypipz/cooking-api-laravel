<?php

namespace App\Cooking;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'cooking_ingredients';

    protected $fillable = [
        'name'
    ];

    public function recipe_ingredient()
    {
        return $this->hasMany('App\Cooking\RecipeIngredient');
    }
}
