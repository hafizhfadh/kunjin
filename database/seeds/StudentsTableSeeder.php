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
          ['id'=>15161000000, 'name'=>'Jonathan', 'class'=> 'RPL1', 'email'=>'bezito017@gmail.com', 'password'=>bcrypt('semangatya')],
          ['id'=>15161000001, 'name'=>'Joseph', 'class'=> 'RPL1', 'email'=>'bezito01@gmail.com', 'password'=>bcrypt('semangatya')],
          ['id'=>15161000002, 'name'=>'Jotaro', 'class'=> 'RPL2', 'email'=>'bezito0@gmail.com', 'password'=>bcrypt('semangatya')],
        ];
        Student::insert($students);
    }
}
