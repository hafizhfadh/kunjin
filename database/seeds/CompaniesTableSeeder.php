<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('companies')->delete();

          $companies = [
            ['company'=>'PT Makmur Sejahtera', 'contact'=>'000000000000', 'address'=>'Jalan disini aja', 'company_pic'=>'company_default.jpg'],
            ['company'=>'PT Semangat Pagi', 'contact'=>'000000000000', 'address'=>'Jalan disini aja', 'company_pic'=>'company_default.jpg']
          ];

      Company::insert($companies);
    }
}
