<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('casts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('cast_movie', function (Blueprint $table) {

            $table->uuid('movie_id');
            $table->uuid('cast_id');

            $table->unique(['movie_id', 'cast_id']);
            $table->primary(['movie_id', 'cast_id']);
            $table->index(['movie_id', 'cast_id']);

            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('cast_serie', function (Blueprint $table) {

            $table->uuid('serie_id');
            $table->uuid('cast_id');

            $table->unique(['serie_id', 'cast_id']);
            $table->primary(['serie_id', 'cast_id']);
            $table->index(['serie_id', 'cast_id']);

            $table->timestamps();
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cast_movie');
        Schema::dropIfExists('cast_serie');
        Schema::dropIfExists('casts');
    }
}
