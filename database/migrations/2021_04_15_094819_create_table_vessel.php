<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVessel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessel', function (Blueprint $table) {
            $table->id();
            $table->string('vessel_name');
            $table->unsignedBigInteger('company_id')->unsigned();
            $table->string('vessel_type');
            $table->string('vessel_flag');
            $table->timestamps();
        });
        Schema::table('vessel', function(Blueprint $table){
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vessel');
    }
}
