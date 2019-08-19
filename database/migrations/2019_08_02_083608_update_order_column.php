<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cooking_recipe_ingredients', function (Blueprint $table) {
            $table->unique(['order', 'recipe_id']);
        });
        Schema::table('cooking_procedures', function (Blueprint $table) {
            $table->unique(['order', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // //
        // Schema::table('cooking_recipe_ingredients', function (Blueprint $table) {
        //     $table->unique(['order', 'recipe_id']);
        // });
    }
}
