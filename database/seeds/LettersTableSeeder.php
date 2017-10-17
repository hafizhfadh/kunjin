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
          ['letter_number'=>'SMK/003','status'=>'Boleh berangkat'],
          ['letter_number'=>'SMK/004','status'=>'Gagal'],
          ['letter_number'=>'SMK/005','status'=>'Pengumpulan laporan'],
          ['letter_number'=>'SMK/006','status'=>'Selesai']
        ];
        Letter::insert($letters);
    }
}
