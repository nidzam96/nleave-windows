<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
        DB::table('roles')->insert([
                    ['name' => 'admin', 'created_at' => $now, 'updated_at' => $now],
        			['name' => 'hr', 'created_at' => $now, 'updated_at' => $now],
        			['name' => 'staff', 'created_at' => $now, 'updated_at' => $now]
                ]);
    }
}
