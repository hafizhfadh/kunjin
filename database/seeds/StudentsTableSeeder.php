<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = [
          ['id'=>1, 'nipd'=>'15161000000', 'name'=>'Jonathan', 'class'=> 'RPL1', 'email'=>'bezito017@gmail.com'],
          ['id'=>2, 'nipd'=>'15161000001', 'name'=>'Joseph', 'class'=> 'RPL1', 'email'=>'bezito017@gmail.com'],
          ['id'=>3, 'nipd'=>'15161000002', 'name'=>'Jotaro', 'class'=> 'RPL2', 'email'=>'bezito017@gmail.com'],
        ];
        Student::insert($students);
    }
}
