<?php

namespace App\Cooking;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'cooking_procedures';

    protected $fillable = [
        'description',
        'order',
        'recipe_id'
    ];

    public function recipe()
    {
        return $this->belongsTo('App\Cooking\Recipe');
    }

}
