<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->required();
            $table->text('description');
            $table->string('cover')->nullable();
            $table->year('year')->nullable();
            $table->smallInteger('rate');
            $table->string('trailer_url');
            $table->string('vimeo_url')->default('https://player.vimeo.com/video/90628173');
            $table->string('maturity_ratings');
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamp('publish_date')->default(now());
            $table->boolean('is_new')->default(true);
            $table->string('quality')->default('HD');
            $table->float('running_time');

            $table->index(['id', 'name']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
