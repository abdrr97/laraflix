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
            $table->uuid('id')->primary();
            $table->string('name')->required();
            $table->text('description');
            $table->string('cover')->nullable();
            $table->year('year')->nullable();
            $table->smallInteger('rate');
            $table->string('trailer_url');
            $table->string('maturity_ratings');
            $table->timestamp('publish_date')->default(now());
            $table->string('quality')->default('HD');
            $table->float('running_time');
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_new')->default(true);

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
        Schema::dropIfExists('series');
    }
}
