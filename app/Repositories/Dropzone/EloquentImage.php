<?php

namespace App\Repositories\Dropzone;

use App\Resource;

class EloquentImage implements ImageRepository
{
    private $resource;
    /**
     * @param App\Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function store($attributes)
    {
        $resource = new Resource();
        $resource->uploadImage($attributes);

        return $resource->id;
    }
}