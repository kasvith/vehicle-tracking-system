<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklist_locations', function (Blueprint $table) {
            $table->increments('id');
	        $table->double('lat');
	        $table->double('lng');
	        $table->string('location');
	        $table->string('note','300')->nullable();
	        $table->integer('blacklist_vehicle_id')->unsigned();
	        $table->foreign('blacklist_vehicle_id')->references('id')->on('blacklist_vehicles')->onDelete('cascade');
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('blacklist_locations');
    }
}
