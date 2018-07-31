<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',75);
            $table->string('nick_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('alt_phone');
            $table->string('designation');
            $table->text('facebook');
            $table->text('address');
            $table->text('comments')->nullable();
            $table->integer('is_friend');
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
        Schema::dropIfExists('contacts');
    }
}

