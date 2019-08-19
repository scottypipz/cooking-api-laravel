<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookingRecipeIngredientsTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_recipe_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantity');
            $table->text('details');
            $table->integer('order');
            $table->timestamps();

            $table->bigInteger('recipe_id')
                ->unsigned();
            $table->bigInteger('ingredient_id')
                ->unsigned();
            
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('cooking_ingredients');
            $table->foreign('recipe_id')
                ->references('id')
                ->on('cooking_recipes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooking_recipe_ingredients');
    }
}
