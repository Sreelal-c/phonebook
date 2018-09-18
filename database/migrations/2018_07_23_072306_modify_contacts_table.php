<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('nick_name')->nullable()->change();
            $table->string('email')->nullable()->change();
           // $table->text('alt_phone')->nullable()->change();
            $table->string('designation')->nullable()->change();
            $table->text('facebook')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->text('comments')->nullable()->change();
            $table->integer('is_friend')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
}
