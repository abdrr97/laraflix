<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGeoLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_geo_logins', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->string('continent_name');
            $table->string('country_code');
            $table->string('country_name');
            $table->string('country_capital');
            $table->string('state_prov');
            $table->integer('zipcode');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('country_flag');
            $table->string('isp');
            $table->string('user_agent');

            $table->uuid('user_id');
            // $table->index(['ip']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_geo_logins');
    }
}
