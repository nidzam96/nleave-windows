<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('ltype_id')->unsigned();
            $table->foreign('ltype_id')->references('id')->on('leavetypes');
            $table->integer('ltime_id')->unsigned();
            $table->foreign('ltime_id')->references('id')->on('leavetimes');
            $table->date('sdate');
            $table->date('edate');
            $table->text('reason', 100);
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
        Schema::drop('leaves');
    }
}
