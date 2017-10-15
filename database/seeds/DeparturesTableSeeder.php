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
          ['id'=>1, 'letter_number'=>'2017/Hubin/Kunjin/Smk.tb/1', 'student_id'=>'["1","3"]', 'company_id'=>1, 'departure_date'=>date('Y-m-d')],
          ['id'=>2, 'letter_number'=>'2017/Hubin/Kunjin/Smk.tb/2', 'student_id'=>'["1","2"]', 'company_id'=>1, 'departure_date'=>date('Y-m-d')],
          ['id'=>3, 'letter_number'=>'2017/Hubin/Kunjin/Smk.tb/3', 'student_id'=>'["2","3"]', 'company_id'=>2, 'departure_date'=>date('Y-m-d')]
        ];

        Departure::insert($departures);
    }
}
