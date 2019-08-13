<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectAttrValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('field_id');
            $table->string('value', 3000);

            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->index('attribute_id');

            $table->foreign('field_id')->references('id')->on('object_fields')->onDelete('cascade');
            $table->index('field_id');

            $table->unique(['field_id', 'attribute_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_attr_values');
    }
}
