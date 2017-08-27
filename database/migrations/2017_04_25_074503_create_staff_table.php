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
            $table->string('preffered_name')->nullable();
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
            $table->float('Annual_taken');
            $table->float('Marriage_taken');
            $table->float('Maternity_taken');
            $table->float('Paternity_taken');
            $table->float('Sick_taken');
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
