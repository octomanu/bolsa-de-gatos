<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMovementToLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::table('logs', function($table){
           $table->text('movement')->default('deblock');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::table('logs', function ($table){
           $table->dropColumn('movement');
        });

    }
}
