<?php

namespace App\Cooking;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $table = 'cooking_recipes';

    protected $fillable = [
        'recipe_name',
        'description',
        'cooking_time_from',
        'cooking_time_to',
        'prep_time_from',
        'prep_time_to',
        'food_category_id',
        'resource_id'
    ];

    public function foodcategory()
    {
        return $this->belongsTo('App\Cooking\FoodCategory');
    }

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    public function recipe_ingredients()
    {
        return $this->hasMany('App\Cooking\RecipeIngredient');
    }

    public function procedures()
    {
        return $this->hasMany('App\Cooking\Procedure');
    }
}
