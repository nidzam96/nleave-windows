<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('positions')->insert(
        			['position_name' => string('HR')],
        			['position_name' => string('Staff')]
                );
    }
}
