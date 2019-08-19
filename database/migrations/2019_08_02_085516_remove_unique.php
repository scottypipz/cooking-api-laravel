<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('cooking_recipe_ingredients', function (Blueprint $table) {
            $table->dropUnique('cooking_recipe_ingredients_order_unique');
        });
        Schema::table('cooking_procedures', function (Blueprint $table) {
            $table->dropUnique(['order', 'recipe_id']);
        });
    }
}
