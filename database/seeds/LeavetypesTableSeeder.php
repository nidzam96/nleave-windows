<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LeavetypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('leavetypes')->insert(
        			['leave_name' => string('Annual'),'leave_day' => integer(15)],
        			['leave_name' => string('Marriage'),'leave_day' => integer(3)],
        			['leave_name' => string('Maternity'),'leave_day' => integer(30)],
        			['leave_name' => string('Paternity'),'leave_day' => integer(7)],
        			['leave_name' => string('Sick'),'leave_day' => integer(15)],
        			['leave_name' => string('Compassionate'),'leave_day' => integer(2)]
                );
    }
}
