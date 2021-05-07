<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServiceHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sailor_id');
            $table->unsignedBigInteger('rank_id');
            $table->unsignedBigInteger('vessel_id');
            $table->date('sign_on_date');
            $table->integer('sign_on_port');            
            $table->date('sign_off_date');
            $table->integer('sign_off_port');
            $table->integer('contract_period');
            $table->date('contract_end_date');
            $table->foreign('sailor_id')->references('id')->on('sailor');
            $table->foreign('rank_id')->references('id')->on('myrank');
            $table->foreign('vessel_id')->references('id')->on('vessel');
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
        Schema::dropIfExists('service_history');
    }
}
