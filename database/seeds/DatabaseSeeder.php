<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(LeavetimesTableSeeder::class);
        $this->call(LeavetypesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ClaimsTableSeeder::class);
    }
}
