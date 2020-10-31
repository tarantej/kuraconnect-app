<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_listings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('service_name');
            $table->string('category');
            $table->text('description');
            $table->string('location');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_listings');
    }
}
