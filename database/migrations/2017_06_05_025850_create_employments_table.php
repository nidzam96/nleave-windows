<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->integer('user_id');
            $table->string('department')->nullable();
            $table->integer('position_id');
            $table->integer('branch_id')->nullable();
            $table->date('start')->nullable();
            $table->integer('employee_number')->nullable();
            $table->integer('report')->nullable();
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
        Schema::drop('employments');
    }
}
