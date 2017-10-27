<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        $teacher = [
          ['id'=>1, 'nik'=>151600004, 'name'=>'Jonathan', 'class'=> 'RPL1', 'email'=>'bezito017@gmail.com', 'password'=>bcrypt('semangatya')],
        ];
        Teacher::insert($teacher);
    }
}
