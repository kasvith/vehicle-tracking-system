<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nic', 20)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->datetime('birth_of_date');
            $table->enum('sex',['male', 'female', 'other']);
            $table->enum('title', ['Mr', 'Mrs', 'Rev', 'Miss']);
            $table->string('address','100');
            $table->string('district',15);
	        $table->string('province',15);
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
        Schema::dropIfExists('owners');
    }
}
