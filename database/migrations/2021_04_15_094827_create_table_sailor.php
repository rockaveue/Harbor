<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSailor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sailor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rank_id');
            $table->string('sailor_name');
            $table->date('date_of_birth');
            $table->string('maritial_status');
            $table->string('address');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('shoe_size');
            $table->string('blood_type');
            $table->integer('job_status');
            $table->foreign('rank_id')->references('id')->on('myrank');
            // job status(1:new comer, 2:signed on, 3:vacation, 4:ready, 5:inactive) 
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
        Schema::dropIfExists('sailor');
    }
}
