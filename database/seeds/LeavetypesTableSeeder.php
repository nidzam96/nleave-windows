<?php

use Illuminate\Database\Seeder;

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
        $now = date('Y-m-d H:i:s', strtotime('now'));
        DB::table('leavetypes')->insert([
        			['leave_name' => 'Annual','leave_day' => 15, 'created_at' => $now, 'updated_at' => $now],
        			['leave_name' => 'Marriage','leave_day' => 3, 'created_at' => $now, 'updated_at' => $now],
        			['leave_name' => 'Maternity','leave_day' => 30, 'created_at' => $now, 'updated_at' => $now],
        			['leave_name' => 'Paternity','leave_day' => 7, 'created_at' => $now, 'updated_at' => $now],
        			['leave_name' => 'Sick','leave_day' => 15, 'created_at' => $now, 'updated_at' => $now],
                ]);
    }
}
