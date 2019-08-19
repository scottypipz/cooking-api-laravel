<?php

namespace App\Http\Controllers\Dropzone;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Resource\ImageRequest;

class ResourceController extends Controller
{
    /**
     * [POST]
     * api/dropzone/upload/image
     * multipart-form-data
     */
    public function uploadImage(ImageRequest $request)
    {
        $time = time();

        dd('test');
        if ( ! $request->hasFile('image')) {
            return $this->jsonError('No File Found!', 400);
        }

        try {

            $file = $request->file('image');
            $name = $request->get('recipe_name') . $time;
            $file_path = 'images/' . $request->get('directory') . '/' . $name;

            Storage::disk('s3')->put($file_path, file_get_contents($file));

        } catch (Exception $e) {

            return $this->jsonError('There was a problem in uploading the image.', 500);

        }

        return $this->jsonSuccess('Image successfully uploaded!');
    }

    /**
     * [POST]
     * api/dropzone/upload/audio
     * multipart-form-data
     */
    public function uploadAudio()
    {

    }
}
