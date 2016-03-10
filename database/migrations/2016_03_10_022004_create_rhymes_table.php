<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRhymesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rhymes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phrase_id');
            $table->integer('other_phrase_id');
            $table->string('timestamp_id');
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
        Schema::drop('rhymes');
    }
}
