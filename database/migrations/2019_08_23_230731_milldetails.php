<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Milldetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('milldetails', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string('millname');
             $table->mediumText('address');
             $table->string('gstno');
             $table->string('pono');
             $table->string('email')->nullable();
             $table->string('price')->nullable();
             $table->string('contact')->nullable();
             $table->string('contactno')->nullable();
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
         Schema::dropIfExists('milldetails');
     }
}
