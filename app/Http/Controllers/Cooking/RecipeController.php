<?php

namespace App\Http\Controllers\Cooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cooking\CreateRecipeRequest;
use App\Repositories\Cooking\RecipeRepository;
use App\Repositories\Cooking\RecipeIngredientRepository;
use App\Repositories\Dropzone\ImageRepository;
use Illuminate\Support\Facades\DB;
use App\Repositories\Cooking\ProcedureRepository;

class RecipeController extends Controller
{
    private $recipe,
        $image,
        $recipeIngredient,
        $procedure;

    public function __construct(
        RecipeRepository $recipe,
        ImageRepository $image,
        RecipeIngredientRepository $recipeIngredient,
        ProcedureRepository $procedure
        )
    {
        $this->recipe = $recipe;
        $this->image = $image;
        $this->recipeIngredient = $recipeIngredient;
        $this->procedure = $procedure;
    }
    /**
     * [POST]
     */
    public function store(CreateRecipeRequest $request)
    {
        DB::beginTransaction();
        // Store image to S3 Bucket and receive the created resource_id
        // $resource_id = $this->image->store($request->only('image', 'recipe_name', 'directory'));
        $resource_id = 18;

        // add the resource_id to the request
        $recipe = $request->only(
            'recipe_name',
            'description',
            'food_category_id',
            'cooking_time_from',
            'cooking_time_to',
            'prep_time_from',
            'prep_time_to')
            + ['resource_id' => $resource_id];

        $recipe = $this->recipe->create($recipe);
        $this->recipeIngredient->create($recipe->id, $request->only('ingredients')['ingredients']);
        $this->procedure->create($recipe->id, $request->only('procedures')['procedures']);
        DB::commit();

        return response()->json(['message' => 'Successfully Created Recipe'], 200);
    }
    public function getByCategory($food_category_id)
    {
        $recipes = $this->recipe->getByCategory($food_category_id);
        return response()->json($recipes, 200);
    }
    /**
     * [GET]
     */
    public function getById($id)
    {
        $recipe = $this->recipe->getById($id);
        return response()->json($recipe, 200);
    }
    // update
}
