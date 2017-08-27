<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        DB::table('branches')->insert(
        			['branch_name' => string('Kota Bharu')],
        			['branch_name' => string('Damansara')]
                );
    }
}
