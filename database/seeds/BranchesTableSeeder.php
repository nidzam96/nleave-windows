<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
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
        DB::table('branches')->insert([
        			['branch_name' => 'Kota Bharu', 'created_at' => $now, 'updated_at' => $now],
        			['branch_name' => 'Damansara', 'created_at' => $now, 'updated_at' => $now]
                ]);
    }
}
