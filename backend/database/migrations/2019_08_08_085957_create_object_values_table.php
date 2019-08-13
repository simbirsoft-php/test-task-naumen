<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('object_id');
            $table->unsignedBigInteger('field_id');
            $table->text('value')->nullable();

            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
            $table->index('object_id');

            $table->foreign('field_id')->references('id')->on('object_fields')->onDelete('cascade');
            $table->index('field_id');

            $table->unique(['object_id', 'field_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_values');
    }
}
