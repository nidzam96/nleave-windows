<?php

use Illuminate\Database\Seeder;

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
        $now = date('Y-m-d H:i:s', strtotime('now'));
        DB::table('positions')->insert([
        			['position_name' => 'HR', 'created_at' => $now, 'updated_at' => $now],
        			['position_name' => 'Staff', 'created_at' => $now, 'updated_at' => $now]
                ]);
    }
}
