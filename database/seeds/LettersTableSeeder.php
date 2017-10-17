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
          ['id'=>1,'letter_number'=>'SMK/001','status'=>'Permohonan surat'],
          ['id'=>2,'letter_number'=>'SMK/002','status'=>'Pemrosesan surat'],
          ['id'=>3,'letter_number'=>'SMK/003','status'=>'Boleh berangkat'],
          ['id'=>4,'letter_number'=>'SMK/004','status'=>'Gagal'],
          ['id'=>5,'letter_number'=>'SMK/005','status'=>'Pengumpulan laporan'],
          ['id'=>6,'letter_number'=>'SMK/006','status'=>'Selesai']
        ];
        Letter::insert($letters);
    }
}
