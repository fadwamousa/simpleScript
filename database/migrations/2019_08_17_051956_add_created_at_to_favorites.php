<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtToFavorites extends Migration
{
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            //
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            //
        });
    }
}
