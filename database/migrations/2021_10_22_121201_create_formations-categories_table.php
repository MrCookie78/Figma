<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations-categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation_id')->index();
            $table->unsignedBigInteger('categorie_id')->index();
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations-categories');
    }
}
