<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModelHasLabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('model_has_label', function (Blueprint $table) {
            $table->primary(['label_id', 'model_id', 'model_type']);
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->index(['model_id', 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
        Schema::dropIfExists('model_has_label');
    }
}
