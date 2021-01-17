<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('genre_movie', function (Blueprint $table) {
            $table->uuid('movie_id');
            $table->uuid('genre_id');

            $table->unique(['movie_id', 'genre_id']);
            $table->primary(['movie_id', 'genre_id']);
            $table->index(['movie_id', 'genre_id']);

            $table->timestamps();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('genre_serie', function (Blueprint $table) {
            $table->uuid('serie_id');
            $table->uuid('genre_id');

            $table->unique(['serie_id', 'genre_id']);
            $table->primary(['serie_id', 'genre_id']);
            $table->index(['serie_id', 'genre_id']);

            $table->timestamps();
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_movie');
        Schema::dropIfExists('genre_serie');
        Schema::dropIfExists('genres');
    }
}
