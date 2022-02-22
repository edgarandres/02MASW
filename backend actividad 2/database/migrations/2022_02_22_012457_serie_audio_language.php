<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SerieAudioLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_audio_language', function (Blueprint $table) {
            $table->unsignedBigInteger('serie_id')->unsigned();
            $table->unsignedBigInteger('language_id')->unsigned();
            $table->foreign('serie_id')->references('id')->on('series');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serie_audio_language');
    }
}
