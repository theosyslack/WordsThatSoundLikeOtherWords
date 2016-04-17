<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubmitterIdToRhyme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('rhymes', function ($table) {
             $table->integer('submitter_id');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
       Schema::table('rhymes', function ($table) {
           $table->dropColumn('submitter_id');
       });
     }
}
