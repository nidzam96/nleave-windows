<?php

use Illuminate\Database\Seeder;

class Role_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->insert([
                    ['role_id' => 1, 'user_id' => 1, 'user_type' => 'App\User']
                ]);
    }
}
