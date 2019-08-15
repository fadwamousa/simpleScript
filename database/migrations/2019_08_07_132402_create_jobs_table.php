<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id');
            $table->bigInteger('user_id');
            $table->text('title');
            $table->text('slug');
            $table->text('roles');
            $table->string('position');
            $table->string('address');
            $table->string('type');
            $table->text('description');
            $table->bigInteger('category_id');
            $table->integer('status');
            $table->date('last_date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
