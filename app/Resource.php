<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resource extends Model
{
    protected $table = 'resources';
    protected $fillable = [
        'image_url'
    ];

    public function recipes()
    {
        $this->hasMany('App\Cooking\Recipe');
    }

    /**
     * Handles the uploading of resources to S3
     * @param object $validated
     */
    public function uploadImage($validated)
    {
        try {

            $time = time();
            $file = $validated['image'];
            $name = $validated['recipe_name'] . $time . '.' . $file->getClientOriginalExtension();
            // Path of the image, images/recipes/Name.jpeg
            $file_path = 'images/' . $validated['directory'] . '/';

            $this->image_url = $this->uploadToS3($file_path . $name, $file);
            $this->save();

        } catch (Exception $e) {

            return response()->json($e->getMessage(), 500);

        }
    }
    
    /**
     * Uploads the image S3
     */
    private function uploadToS3(string $full_path, $file, string $privacy='public')
    {
        $S3 = Storage::disk('s3');
        if ( ! $S3->put($full_path, file_get_contents($file), $privacy)) {

            throw new Exception('Unable to upload to S3 Bucket');
            
        }
        return $S3->url($full_path);
    }
}
