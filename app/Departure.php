<?php

namespace App;

use App\Company;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
  protected $table = 'departures';
  protected $fillable = ['letter_number', 'student_id', 'company_id', 'departure_date'];

  public function company()
  {
    return $this->belongsTo(Company::class, 'company_id');
  }
  public function students()
  {
    return $this->belongsTo(Student::class, 'company_id');
  }
}
