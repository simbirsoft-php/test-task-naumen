<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('field');
            $table->unsignedBigInteger('object_type_id');

            $table->foreign('object_type_id')->references('id')->on('object_types')->onDelete('cascade');
            $table->index('object_type_id');

            $table->unique(['object_type_id', 'field']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_fields');
    }
}
