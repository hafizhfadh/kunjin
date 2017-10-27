<?php

namespace App;

use App\Departure;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
  protected $table = 'letters';
  protected $fillable = ['letter_number', 'status'];

  public function departure()
  {
    return $this->hasOne(Departure::class);
  }
}
