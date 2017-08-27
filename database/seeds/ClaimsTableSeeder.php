<?php

use Illuminate\Database\Seeder;

class ClaimsTableSeeder extends Seeder
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
        DB::table('claims')->insert([
        			['claim_name' => 'Handphone', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Entertainment', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Mileage', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Parking & Toll', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Accomodation', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Allowance', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Medical', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Staff Welfare', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Stationery', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Repair & Maintainace - Office Equipment', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Repair & Maintainace - Motor Vehicle', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Repair & Maintainace - Office', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Utilities', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Travel', 'created_at' => $now, 'updated_at' => $now],
        			['claim_name' => 'Others', 'created_at' => $now, 'updated_at' => $now],
                ]);
    }
}
