<?php

namespace App;

use App\Company;
use App\Letter;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
  public $incrementing = false;

  public function company()
  {
    return $this->belongsTo(Company::class, 'company_id');
  }
  public function letter()
  {
    return $this->belongsTo(Letter::class, 'letter_id');
  }
}
