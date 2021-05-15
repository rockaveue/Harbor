<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVesselIdToTableJobOffer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_offer', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('vessel_id');
            $table->foreign('vessel_id')->references('id')->on('vessel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_offer', function (Blueprint $table) {
            //
            $table->dropColumn(['vessel_id']);
        });
    }
}
