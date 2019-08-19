<?php

namespace App\Repositories\Cooking;

use App\Cooking\RecipeIngredient;

class EloquentRecipeIngredient implements RecipeIngredientRepository
{

    private $model;

    /**
     * @param RecipeIngredient $model
     */
    function __construct(RecipeIngredient $model)
    {
        $this->model = $model;
    }

    public function getByRecipe($recipe_id)
    {
        return [];
    }
    /**
     * Create batch a list of recipe_ingredients
     */
    public function create(int $recipe_id, array $recipe_ingredients)
    {
        foreach ($recipe_ingredients as $key => $val) {
            $recipe_ingredients[$key]['recipe_id'] = $recipe_id;
            $recipe_ingredients[$key]['order'] = $key + 1;
        }
        return $this->model->insert($recipe_ingredients);
    }

}