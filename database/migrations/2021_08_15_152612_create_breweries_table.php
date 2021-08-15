<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreweriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breweries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('label_image');
            $table->integer('beer_count');

            $table->string('location_country');
            $table->string('location_address');
            $table->string('location_city');
            $table->string('location_state');
            $table->double('location_latitude');
            $table->double('location_longitude');

            $table->integer('rating_count');
            $table->double('rating_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breweries');
    }
}
