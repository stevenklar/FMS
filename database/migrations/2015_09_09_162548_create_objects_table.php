<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('objects', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status');
            $table->string('category');

            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->timestamps();
        });
    }

    public function down()
    {
        if (Schema::hasTable('objects')) {
            Schema::drop('objects');
        }
    }
}
