<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressAndLecturersToConferencesTable extends Migration
{
    public function up()
    {
        Schema::table('conferences', function (Blueprint $table) {
            $table->string('address')->nullable(); 
            $table->text('lecturers')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('conferences', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('lecturers');
        });
    }
}

