<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('platform_id')->unsigned();
            $table->unsignedBigInteger('director_id')->unsigned();
            $table->string('title');
            $table->timestamps();
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade')->onUpdate('cascade');
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
