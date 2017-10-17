<?php

use Illuminate\Database\Seeder;
use App\Departure;

class DeparturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departures')->delete();

        $departures = [
          ['id'=>1, 'letter_id'=>1, 'student_id'=>'["1","3"]', 'company_id'=>1, 'departure_date'=>date('Y-m-d')],
          ['id'=>2, 'letter_id'=>2, 'student_id'=>'["1","2"]', 'company_id'=>1, 'departure_date'=>date('Y-m-d')],
          ['id'=>3, 'letter_id'=>3, 'student_id'=>'["2","3"]', 'company_id'=>2, 'departure_date'=>date('Y-m-d')],
          ['id'=>4, 'letter_id'=>4, 'student_id'=>'["2","3"]', 'company_id'=>2, 'departure_date'=>date('Y-m-d')],
          ['id'=>5, 'letter_id'=>5, 'student_id'=>'["2","3"]', 'company_id'=>2, 'departure_date'=>date('Y-m-d')],
          ['id'=>6, 'letter_id'=>6, 'student_id'=>'["2","3"]', 'company_id'=>2, 'departure_date'=>date('Y-m-d')]
        ];

        Departure::insert($departures);
    }
}
