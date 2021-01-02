<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('numOfPerson');
            $table->string('phoneNumber',255);
            $table->string('feature_image');
            $table->string('tableRes');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
////
            $table->foreign('menu_id')->references('id')->on('menus');
           $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_reservations_');
    }
}
