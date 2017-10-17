<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $table = 'letters';
    protected $fillable = ['letter_number', 'status'];

    public function departure()
    {
      $this->hasOne(Departure::class);
    }
}
