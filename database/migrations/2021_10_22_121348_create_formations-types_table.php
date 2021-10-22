<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations-types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation_id')->index();
            $table->unsignedBigInteger('type_id')->index();
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations-types');
    }
}
