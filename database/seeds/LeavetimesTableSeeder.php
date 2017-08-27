<?php

use Illuminate\Database\Seeder;

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
        $now = date('Y-m-d H:i:s', strtotime('now'));
        DB::table('leavetimes')->insert([
        			['times_name' => 'FULL', 'created_at' => $now, 'updated_at' => $now],
        			['times_name' => 'AM', 'created_at' => $now, 'updated_at' => $now],
        			['times_name' => 'PM', 'created_at' => $now, 'updated_at' => $now]
                ]);
    }
}
