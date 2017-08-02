<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompensationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->integer('user_id');
            $table->string('type', 50)->nullable();
            $table->integer('salary')->nullable();
            $table->string('pay_method', 50)->nullable();
            $table->string('bank', 100)->nullable();
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
        Schema::drop('compensation');
    }
}
