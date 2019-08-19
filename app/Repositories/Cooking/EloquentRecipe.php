<?php

namespace App\Repositories\Cooking;

use App\Cooking\Recipe;

class EloquentRecipe implements RecipeRepository
{

    private $model;

    /**
     * @param Recipe $model
     */
    function __construct(Recipe $model)
    {
        $this->model = $model;
    }

    public function getByCategory($food_category_id)
    {
        return $this->model->where('food_category_id', $food_category_id)
            ->orderBy('updated_at', 'DESC')
            ->with(['resource' => function ($query) {
                $query->select('id', 'image_url');
            }])
            ->get();
    }

    public function getById($id)
    {
        return $this->model
            ->where('id', $id)
            ->with(['resource' => function ($query) {
                $query->select(['id', 'image_url']);
            }])
            /** Recipe Ingredients */
            ->with(['recipe_ingredients' => function ($query) {
                $query
                    ->select([
                        'recipe_id',
                        'details',
                        'quantity',
                        'ingredient_id'
                    ])
                    /** Ingredient Details */
                    ->with(['ingredient' => function ($query) {
                        $query->select(['id', 'name']);
                    }])
                    ->orderBy('order');
            }])
            /** Recipe Procedures */
            ->with(['procedures' => function ($query) {
                $query->select(
                    'recipe_id',
                    'description')
                    ->orderBy('order');
            }])
            ->get();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function delete($id)
    {
        $this->getById($id)->delete($id);
        return true;
    }

}