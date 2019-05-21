<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->engine = 'InnoDB';

            
            $table->Increments('id');

            $table->string('name');
            $table->string('phone');
            $table->double('price');
            $table->string('date');

        //---------------foreign key of details -------------//
        $table->unsignedInteger('camp_id');
        $table->foreign('camp_id')->references('id')->on('camps');
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
        Schema::dropIfExists('reservations');
    }
}









