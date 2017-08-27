<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LeavetimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('leavetimes')->insert(
        			['times_name' => string('FULL')],
        			['times_name' => string('AM')],
        			['times_name' => string('PM')]
                );
    }
}
