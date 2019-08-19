<?php

namespace App\Repositories\Cooking;

interface ProcedureRepository
{
    public function getByRecipe($recipe_id);

    public function create(int $recipe_id, array $recipe_ingredients);
}