<?php

namespace App\Http\Requests\Resource;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImageRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return $this->imageUpload();
        }
        return [];
    }
    /**
     * Rules for uploading an image
     * 
     * @return array
     */
    public function imageUpload()
    {
        return [
            'image' => 'required|image|max:2048',
            'recipe_name' => 'required|max:100',
            // 'scale' => 'required',
            // directories in the images folder from s3
            'directory' => [
                'required',
                Rule::in([
                    'recipes',
                    'projects',
                    'static'
                ])
            ]
        ];
    }
}
