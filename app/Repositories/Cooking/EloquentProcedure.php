<?php

namespace App\Repositories\Cooking;

use App\Cooking\Procedure;

class EloquentProcedure implements ProcedureRepository
{

    private $model;

    /**
     * @param Recipe $model
     */
    function __construct(Procedure $model)
    {
        $this->model = $model;
    }

    public function getByRecipe($recipe_id)
    {
        return $this->model->where('recipe_id', $recipe_id);
    }

    public function create(int $recipe_id, array $procedures)
    {
        foreach ($procedures as $key => $val) {
            $procedures[$key]['recipe_id'] = $recipe_id;
            $procedures[$key]['order'] = $key + 1;
        }
        return $this->model->insert($procedures);
    }
}