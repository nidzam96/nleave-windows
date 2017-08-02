<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('claim_id');
            $table->string('month');
            $table->date('date');
            $table->text('particular');
            $table->text('brn');
            $table->text('gstno');
            $table->decimal('exist_amount',7,2)->nullable();
            $table->decimal('potential_amount',7,2)->nullable();
            $table->decimal('supplier_amount',7,2)->nullable();
            $table->text('client_name')->nullable();
            $table->text('destination')->nullable();
            $table->decimal('toll',7,2)->nullable();
            $table->decimal('parking',7,2)->nullable();
            $table->decimal('accomodation',7,2)->nullable();
            $table->decimal('allowance',7,2)->nullable();
            $table->float('total_travel')->nullable();
            $table->decimal('total_amount');
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
        Schema::drop('claim_applications');
    }
}
