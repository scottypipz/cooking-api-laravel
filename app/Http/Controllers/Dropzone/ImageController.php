<?php

namespace App\Http\Controllers\Dropzone;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\ImageRequest;
use App\Resource;

class ImageController extends Controller
{
    private $image;
    public function __construct(RecipeRepository $recipe)
    {
        $this->image = $image;
    }
    /**
     * Handles the uploading of image
     * [POST] - api/dropzone/upload/image
     * multipart-form-data
     */
    public function store(ImageRequest $request)
    {
        if ( ! $request->hasFile('image')) {
            return $this->jsonError('No File Found!', 400);
        }
        
        $resource = new Resource();
        $resource->uploadImage($request->validated());

        $payload = ['resource_id' => $resource->id];
        return response()->json($payload, 200);
    }
}
