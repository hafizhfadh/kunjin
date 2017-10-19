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
        DB::table('departures')->truncate();

        $departures = [
          ['letter_id'=>1, 'student_id'=>'["1","3"]', 'company_id'=>1, 'departure_date'=>date('Y-m-d')],
          ['letter_id'=>2, 'student_id'=>'["2"]', 'company_id'=>2, 'departure_date'=>date('Y-m-d')],
        ];

        Departure::insert($departures);
    }
}
