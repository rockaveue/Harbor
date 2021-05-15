<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddSignOnPortToJobOffer extends Migration
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
            $table->integer('sign_on_port');
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
            $table->dropColumn(['sign_on_port']);
        });
    }
}
