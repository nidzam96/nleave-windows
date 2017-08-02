<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('preferred_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('number')->nullable();
            $table->text('address', 100)->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('status')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('position_id');
            $table->float('leave_taken');
            $table->float('annual_taken');
            $table->float('marriage_taken');
            $table->float('maternity_taken');
            $table->float('paternity_taken');
            $table->float('sick_taken');
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
        Schema::drop('staff');
    }
}
