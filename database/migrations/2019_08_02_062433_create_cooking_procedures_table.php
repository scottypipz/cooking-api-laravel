<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCookingProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_procedures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->tinyInteger('order')->unsigned();
            $table->timestamps();

            /** FOREIGN KEYS */
            $table->bigInteger('recipe_id')
                ->unsigned();
            $table->foreign('recipe_id')
                ->references('id')
                ->on('cooking_recipes');

            $table->unique('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooking_procedures');
    }
}
