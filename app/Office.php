<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
  // Table Name
  protected $table = 'offices';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  public function posts(){
      return $this->hasMany('App\Employees');
    }
}
