<?php

namespace App\Cooking;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $table = 'cooking_recipe_ingredients';

    protected $fillable = [
        'quantity',
        'details',
        'order',
        'recipe_id',
        'ingredient_id'
    ];

    public function recipe()
    {
        return $this->belongsTo('App\Cooking\Recipe');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Cooking\Ingredient');
    }
}
