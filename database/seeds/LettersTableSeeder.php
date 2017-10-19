<?php

use Illuminate\Database\Seeder;
use App\Letter;

class LettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('letters')->delete();

        $letters = [
          ['letter_number'=>'SMK/001','status'=>'Permohonan surat'],
          ['letter_number'=>'SMK/002','status'=>'Pemrosesan surat'],
        ];
        Letter::insert($letters);
    }
}
