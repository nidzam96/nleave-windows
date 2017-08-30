<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->insert([
                    ['name' => 'admin', 'email' => 'admin@hr.nazrol.tech', 'password' => bcrypt('password'), 'position' => 'Admin', 'role' => 1, 'created_at' => $now, 'updated_at' => $now]
                ]);
    }
}
