<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookingRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('recipe_name', 100);
            $table->text('description');
            $table->tinyInteger('cooking_time_from')->default(0);
            $table->tinyInteger('cooking_time_to')->default(5);
            $table->tinyInteger('prep_time_from')->default(0);
            $table->tinyInteger('prep_time_to')->default(5);
            $table->timestamps();

            /** Foreign Keys */
            $table->integer('food_category_id')
                ->unsigned()
                ->default(1);
            $table->integer('resource_id')
                ->unsigned();
            $table->foreign('resource_id')
                ->references('id')
                ->on('resources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooking_recipes');
    }
}
