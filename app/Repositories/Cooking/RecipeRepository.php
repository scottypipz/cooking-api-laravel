<?php

namespace App\Repositories\Cooking;

interface RecipeRepository
{

    public function getByCategory($food_category_id);

    public function getById($id);

    /**
     * @return int
     */
    public function create(array $attributes);

    public function delete($id);

}