<?php

namespace App\Http\Requests\Cooking;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'recipe_name' => 'required|max:100',
            'description' => 'required',

            'image' => 'required|image|max:2048',
            // 'scale' => 'required',
            // directories in the images folder from s3
            'directory' => [
                'required',
                Rule::in([
                    'recipes',
                    'projects',
                    'static'
                ])
                ],

            'cooking_time_from' => 'integer|min:0',
            'cooking_time_to' => 'integer|min:0',
            'prep_time_from' => 'integer|min:0',
            'prep_time_to' => 'integer|min:0',

            // TODO validate if in food_category table and resources table
            'food_category_id' => 'required',

            'ingredients' => 'required|array|min:1',
            'procedures' => 'required|array|min:1',

            'ingredients.*.ingredient_id' => 'required|exists:cooking_ingredients,id',
            'ingredients.*.quantity' => 'required|string',
            'ingredients.*.description' => 'string',

            'procedures.*.description' => 'required|string'
        ];
    }
}
