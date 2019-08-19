<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->char('salary');
            $table->string('gender');
            $table->integer('experience');
            $table->integer('number_of_vacancy');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
            $table->dropColumn('number_of_vacancy');
            $table->dropColumn('gender');
            $table->dropColumn('salary');
            $table->dropColumn('experience');


        });
    }
}
