<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Cooking\RecipeRepository;
use App\Repositories\Cooking\EloquentRecipe;

use App\Repositories\Cooking\RecipeIngredientRepository;
use App\Repositories\Cooking\EloquentRecipeIngredient;

use App\Repositories\Cooking\ProcedureRepository;
use App\Repositories\Cooking\EloquentProcedure;

use App\Repositories\Dropzone\ImageRepository;
use App\Repositories\Dropzone\EloquentImage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(RecipeRepository::class, EloquentRecipe::class);
        $this->app->singleton(RecipeIngredientRepository::class, EloquentRecipeIngredient::class);
        $this->app->singleton(ProcedureRepository::class, EloquentProcedure::class);
        $this->app->singleton(ImageRepository::class, EloquentImage::class);
        //
    }
}
