<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function($table) {
            $table->string('sid');
            $table->string('name');
            $table->string('scope');
            $table->string('password');

            $table->timestamps();
        });
    }

    public function down()
    {
        if (Schema::hasTable('sessions')) {
            Schema::drop('sessions');
        }
    }
}
